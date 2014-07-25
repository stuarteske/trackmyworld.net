<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 20/07/2014
 * Time: 10:57
 */

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;

class FacebookController extends BaseController {

    private $appId = '701815586557016';
    private $appSecret = '4555bc97f8f56196a919ddd31bbfeabe';
    private $clientKey = '213bf78185429ea3e0a40f70ce10fd2c';
    private $socialNetworkName = 'facebook';


    /**
     * Instantiate Controller.
     */
    public function __construct()
    {
        switch($_SERVER['SERVER_NAME']) {
            case 'prayerplanner.local':
                // Set the keys
                $this->setAppId('701815586557016');
                $this->setAppSecret('4555bc97f8f56196a919ddd31bbfeabe');
                break;
            case 'whatif.local':
                // Set the keys
                $this->setAppId('1513830048832409');
                $this->setAppSecret('ae3bba36e7b149437a8b91d3af5fc621');
                break;
            default:
                // Set the keys
                $this->setAppId('701815586557016');
                $this->setAppSecret('4555bc97f8f56196a919ddd31bbfeabe');
                break;
        }

        // Events
        Event::listen('social.facebook.success', function($socialAccount)
        {
            // Post facebook message
            $facebook = $this->createFacebookInstance();

            $this->makeApiRequest(
                $facebook,
                '/'.$facebook->getUser().'/feed',
                'POST',
                array(
                    'message' => 'I am now using http//www.prayerplanner.net to manage my prayer teams. Check it out.'
                ),
                true
            );
        });
    }

    public function requestAuthorisation() {
        return Redirect::to(action('FacebookController@redirectToAuthorisation'));
    }

    public function revokeAuthorisation() {
        // Find and delete social record
        $socialAccount = SocialAccount::findOneByUserIdAndSocialNetworkName(
            Auth::id(),
            $this->getSocialNetworkName()
        );

        if (isset($socialAccount)) $socialAccount->delete();

        return Redirect::to( action('ProfileController@index'));
    }

    public function redirectToAuthorisation() {
        $facebook = $this->createFacebookInstance();

        return Redirect::to( $facebook->getLoginUrl(array(
            'redirect_uri' => action('FacebookController@receiveAuthorisationCode'),
            'scope' => array('email', 'publish_actions', 'public_profile')
        )));
    }

    public function receiveAuthorisationCode() {
        $facebook = $this->createFacebookInstance();

        $socialUserId = $facebook->getUser();
        $facebook->setExtendedAccessToken(); // Long-lived access_token 60 days
        if(!$socialUserId) { // Error page
            $input = Input::all();
            echo '<h1>Facebook OAuth Error</h1>';
            echo '<pre>';
            echo print_r($input);
            echo '</pre>';
            die();
        }

        // Look for existing social account
        $socialAccount = SocialAccount::findOneBySocialUserIdAndSocialNetworkName(
            $socialUserId,
            $this->getSocialNetworkName()
        );

        if (!isset($socialAccount)) {
            $socialAccount = new SocialAccount();

            // Set the new link flag for the event to fire
            $newSocialLink = true;
        }

        $socialAccount->network = $this->getSocialNetworkName();
        $socialAccount->social_user_id = $socialUserId;
        $socialAccount->token = $facebook->getAccessToken();
        $socialAccount->expire = null;

        if (Auth::id()) {
            // Existing user so save the existing social account
            $socialAccount->user_id = Auth::id();
            $socialAccount->save();

            if (isset($newSocialLink)) $event = Event::fire('social.facebook.success', array($socialAccount));
            unset($newSocialLink);

            return Redirect::to( action('ProfileController@index'));
        } else {
            // Get the facebook user details
            try{
                $responseArray = $facebook->api('/me');
            } catch(\FacebookApiException $e) {
                die('404');
            }

            //Logged out user or new user
            // Find a user by the returned email
            $user = User::where('email', $responseArray['email'])->first();
            if (isset($user)) {
                // User Already in the system
                //Attach the SocialAccount
                if (isset($newSocialLink)) {
                    // Is new attach to user return to dashboard
                    $socialAccount->user_id = $user->id;
                    $socialAccount->save();
                }

                // Status check
                if (!is_null($user->disabled)) {
                    Session::flash('message', 'This account has been disabled and is not allowed to login.');
                    return Redirect::to( action('HomeController@showHome') );
                } // disabled

                if (is_null($user->confirmed)){
                    Session::flash('message', 'This account has not been activated yet. Search your email for the activation instructions.');
                    return Redirect::to( action('HomeController@showHome') );
                } // Not confirmed

                Auth::login($user);

                return Redirect::to( action('DashboardController@dashboard') );
            } else {
                // Create a new user and ask for a password
                $newUser = new User();
                $password = str_random(8);
                $newUser->email = $responseArray['email'];
                $newUser->password = Hash::make($password);
                $newUser->confirmed = date('Y-m-d H:i:s');
                $newUser->created_at = date('Y-m-d H:i:s');
                $newUser->updated_at = date('Y-m-d H:i:s');
                $newUser->key = str_random(40);
                $newUser->save();

                $newProfile = new Profile();
                $newProfile->user_id = $newUser->id;
                $newProfile->name = $responseArray['name'];
//                $newProfile->screenname = '';
//                $newProfile->jobtitle = '';
                $newProfile->created_at = date('Y-m-d H:i:s');
                $newProfile->updated_at = date('Y-m-d H:i:s');
                $newProfile->save();

                $socialAccount->user_id = $newUser->id;
                $socialAccount->save();

                Auth::login($newUser);

                // Fire the event
                $event = Event::fire('social.facebook.success', array($socialAccount));

                // Email the password out
                $GLOBALS['emailRecipient'] = $responseArray['email'];

                // Issue the password by mail
                $data = array(
                    'newPassword' => $password,
                    'loginLink' => URL::action('UserController@login'),
                );

                Mail::send('emails.passwordnew', $data, function($message)
                {
                    $message->to( $GLOBALS['emailRecipient'] )
                        ->subject('New Password');
                });

                Session::flash('message', 'Check your email inbox for more instructions and your account password.');

                return Redirect::action('DashboardController@dashboard');
            }
        }
    }

    public function createFacebookInstance() {
        $config = array(
            'appId' => $this->getAppId(),
            'secret' => $this->getAppSecret(),
            'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
        );

        return new \Facebook($config);
    }

    public function makeApiRequest(\Facebook $facebook, $url, $method, $parameters, $retry = false)
    {
        try {
            $facebook->api(
                $url,
                $method,
                $parameters
            );

            return null;
        } catch(\FacebookApiException $e) {
            if ($e->getType() == "OAuthException" || in_array( $e->getCode(), array(190, 102) )) {
                return Redirect::to( action('FacebookController@redirectToAuthorisation'));

                // Retrieving a valid access token.
//                $dialog_url= "https://www.facebook.com/dialog/oauth?"
//                    . "client_id=" . $this->getAppId()
//                    . "&redirect_uri=" . urlencode(action('ProfileController@index'));
//                echo("<script> top.location.href='" . $dialog_url
//                    . "'</script>");
            }

            if ($retry) $this->makeApiRequest($facebook,$url,$method,$parameters,false);

            return Redirect::to( action('ProfileController@index') );
        }
    }

    /**
     * @param string $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param string $appSecret
     */
    public function setAppSecret($appSecret)
    {
        $this->appSecret = $appSecret;
    }

    /**
     * @return string
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * @param string $clientKey
     */
    public function setClientKey($clientKey)
    {
        $this->clientKey = $clientKey;
    }

    /**
     * @return string
     */
    public function getClientKey()
    {
        return $this->clientKey;
    }

    /**
     * @param string $socialNetworkName
     */
    public function setSocialNetworkName($socialNetworkName)
    {
        $this->socialNetworkName = $socialNetworkName;
    }

    /**
     * @return string
     */
    public function getSocialNetworkName()
    {
        return $this->socialNetworkName;
    }


}