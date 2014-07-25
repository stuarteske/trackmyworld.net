<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 07/07/2014
 * Time: 18:56
 */

class ProfileController extends BaseController {

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('auth', array());

        $this->beforeFilter('csrf', array('on' => 'post'));

        // Events
        Event::listen('user.account.created', function($user)
        {
            $this->createProfile($user);
        });
    }

    public function index($user_id = 0)
    {
        $user = User::find(Auth::id());

        // Test for profile
        // Code...

        return View::make(
            'backend.profile.index',
            array(
                'user' => $user,
                'linkedFacebook' => SocialAccount::hasLinkedAccount(
                    Auth::id(),
                    'facebook'
                )
            )
        );
    }

    public function editProfile($user_id = 0)
    {
        $user = User::find(Auth::id());

        // Read form inputs and delete account if valid
        if (Request::isMethod('post')) {
            // validate the info, create rules for the inputs
            $rules = array(
                'screenname' => 'required|min:3|max:32',
                'name' => 'required|min:4|max:32',
                'jobtitle' => 'required|max:255'
            );

            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {
                $user->profile->screenname = Input::get('screenname');
                $user->profile->name = Input::get('name');
                $user->profile->jobtitle = Input::get('jobtitle');

                // Update the user
                $user->profile->save();

                // redirect
                Session::flash('message', 'Congratulations, you have successfully updated your profile.');

                return Redirect::action('ProfileController@index');
            }
        }

        return View::make(
            'backend.profile.edit',
            array(
                'user' => $user,
            )
        );
    }

    public function editPassword($user_id = 0)
    {
        $user = User::find(Auth::id());

        // Read form inputs and delete account if valid
        if (Request::isMethod('post')) {
            // validate the info, create rules for the inputs
            $rules = array(
                'new-password' => 'required|alphaNum|min:8',
                'repeat-password' => 'required|alphaNum|min:8|same:new-password' // password can only be alphanumeric and has to be greater than 8 characters
            );

            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {

                // Update the password
                $user->password = Hash::make(Input::get('new-password'));
                $user->save();

                // redirect
                Session::flash('message', 'Congratulations, you have successfully changed your password.');

                return Redirect::action('ProfileController@index');
            }
        }

        return View::make(
            'backend.profile.password',
            array(
                'user' => $user,
            )
        );
    }

    public function delete($user_id = 0)
    {
        // Get the user object
        $user = User::find(Auth::id());

        // Read form inputs and delete account if valid
        if (Request::isMethod('post')) {

            // validate the info, create rules for the inputs
            $rules = array(
                'email'    => 'required|email', // make sure the email is an actual email
            );

            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput(Input::except('email')); // send back the input (not the password) so that we can repopulate the form
            } else {
                // Custom validator
                if (Input::get('email') != $user->email) {
                    Session::flash('message', '<strong>Sorry</strong> you didn\'t type the correct email address.');
                    return Redirect::back();
                }


                $user->delete();
                Session::flash('message', '<strong>Success</strong> your account has been removed.');
                return Redirect::to('/');
            }
        }

        return View::make(
            'backend.profile.delete',
            array(
                'user' => $user,
            )
        );
    }

    public function createProfile(User $user) {
        $newProfile = new Profile();
        $newProfile->user_id = $user->id;
        $newProfile->save();
    }
}
