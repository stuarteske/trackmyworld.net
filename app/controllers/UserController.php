<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends BaseController {

    private $recipientEmailAddress = '';

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('auth', array(
            'except' => array(
                'activation',
                'cancellation',
                'login',
                'signup',
                'logout',
                'passwordRequest',
                'passwordGeneration',
            ),
        ));

        $this->beforeFilter('csrf', array('on' => 'post'));

        $this->afterFilter(
            'log',
            array(
                'only' => array(
                    'activation',
                    'login',
                    'signup'
                )
            )
        );

        // Register the 404
        App::error(function(ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        });
    }

    public function activation($id, $confirmationKey = "")
    {

        if (Request::isMethod('post'))
        {
            // validate the info, create rules for the inputs
            $rules = array(
                'confirmkey'    => 'required', // make sure the email is an actual email
            );
            $messages = array(
                'required' => 'This field is required and can not be empty.',
            );

            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules, $messages);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {

                if ($confirmationKey == '') Session::flash('message', '<strong>Sorry</strong> you must enter an activation key. Try again');

                return Redirect::action('UserController@activation', array('id' => $id))
                    ->withErrors($validator);
            }

            $confirmationKey = Input::get('confirmkey');
        }

        // Validation

        //Filter the id
        $id = intval($id);
        if ($id <= 0) {
            return Redirect::action('UserController@login', array('id' => Auth::id()));
        }

        // Filter the confirmation key
        $confirmationKey = preg_replace("/[^A-Za-z0-9 ]/", '', $confirmationKey);

        // Find the user
        $user = User::find($id);
            if (is_null($user)) die('404 - Not found');

        // Already confirmed
        if (!is_null($user->confirmed)) return View::make('back.show');

        // Check for confirmation key
        if ($confirmationKey != "") {
            // Check the confirmation code
            $confirmationKey = e($confirmationKey);
            if ($user->key == $confirmationKey) {
                $user->confirmed = date('Y-m-d H:i:s');
                $user->save();
                Session::flash('message', '<strong>Success</strong> your confirmation has been confirmed.');

                // Try to direct them to the dash board after the confirmation
                return Redirect::action('DashboardController@dashboard', array('id' => $id));

            } else {
                sleep(4);
                Session::flash('message', '<strong>Sorry</strong> your confirmation attempt failed. Try again');
            }
        }

        return View::make('user.activation', array(
            'id' => $id,
            'noNavigation'=>true,
        ));
    }

    public function cancellation($id, $key = "") {
        // Validation

        //Filter the id
        $id = intval($id);
        if ($id <= 0) {
            return Redirect::action('UserController@login', array('id' => Auth::id()));
        }

        // Filter the confirmation key
        $confirmationKey = preg_replace("/[^A-Za-z0-9 ]/", '', $key);

        // Find the user
        $user = User::find($id);

        // If the user already active?
        if (is_null($user->confirmed)) {
            $user->delete();
            Session::flash('message', 'Congratulations the user account has been removed from our system.');
        }

        return Redirect::action('HomeController@showHome');
    }

    public function signup()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email|unique:users|min:6', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:8', // password can only be alphanumeric and has to be greater than 8 characters
            'repeat-password' => 'required|alphaNum|min:8|same:password' // password can only be alphanumeric and has to be greater than 8 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            Session::flash('message', 'Sorry, there was an error with your sign up request. Please check the form and try again.');

            return Redirect::action('HomeController@showHome')
                ->withErrors($validator)
                ->withInput(Input::except('password'))
                ->withInput(Input::except('repeat-password'));
        } else {

            // Create the new user
            $user = new User();
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');
            $user->key = str_random(40);
            $user->save();

            $event = Event::fire('user.account.created', array($user));

            // redirect
            Session::flash('message', 'Congratulations you have successfully created an account. Check your email and confirm your account to start using the Prayer Planner.');

            // Send Email
            $data = array(
                'activationLink' => URL::action('UserController@activation', array($user->id, $user->key)),
                'cancellationLink' => URL::action('UserController@cancellation', array($user->id, $user->key)),
            );

            Mail::send('emails.welcome', $data, function($message)
            {
                $message->to(Input::get('email'))->subject('Welcome');
            });

            return Redirect::action('HomeController@showHome');
        }
    }

    public function login()
    {
        if (Auth::check()) Redirect::to( action('DashboardController@dashboard') );

        if (Request::isMethod('get')) {
            return View::make(
                'user.login',
                array('noNavigation'=>true)
            );
        } else {

            // validate the info, create rules for the inputs
            $rules = array(
                'email'    => 'required|email|min:6', // make sure the email is an actual email
                'password' => 'required|alphaNum|min:8', // password can only be alphanumeric and has to be greater than 3 characters
                'remember' => 'boolean'
            );

            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return Redirect::to('login')
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
            } else {

                // create our user data for the authentication
                $userdata = array(
                    'email' 	=> Input::get('email'),
                    'password' 	=> Input::get('password')
                );

                // Remember Me?
                $remember = (Input::has('remember')) ? true : false;

                // attempt to do the login
                if (Auth::attempt($userdata, $remember)) {
                    Log::info('Login success');
                    // validation successful!
                    Session::flash('message', '<strong>Congradulations</strong>> you have logged in successfully.');
                    // redirect them to the secure section or whatever
                    return Redirect::action('DashboardController@dashboard');

                    //TODO: Email success message with is this you warning
                } else {
                    Log::info('Login failed');
                    Session::flash('message', '<strong>Sorry</strong> your login attempt failed. Try again');
                    // validation not successful, send back to form
                    return Redirect::to('login');
                }

            }
        }
    }

    public function logout()
    {
        Auth::logout(); // log the user out of our application
        Session::flash('message', 'You have been logged out successfully.');
        return Redirect::action('HomeController@showHome');
    }

    public function listAll()
    {
        $user = User::find(Auth::id());

        $filter = DataFilter::source(User::with('profile'));
        $filter->attributes(array('class'=>'form-inline'));
        $filter->add('id','ID', 'text');
        $filter->add('email','Email','text');

        $filter->submit('search');
        $filter->reset('reset');

        $grid = DataGrid::source($filter);
        $grid->add('id','ID', true)->style("width:80px");
        $grid->add('email','Email');
        $grid->add('confirmed','Activated');
        $grid->add('disabled','Disabled');
        $grid->add('created_at','Created');

        $grid->edit('/dashboard/user/edit', 'Edit','show|modify|delete');
        $grid->orderBy('id','desc');
        $grid->paginate(10);

        $grid->row(function ($row) {
            if ($row->cell('confirmed')->value == '') $row->style("background-color:#f39c12");
            if ($row->cell('disabled')->value != '' && $row->cell('disabled')->value != '0000-00-00 00:00:00' ) $row->style("background-color:#f56954");
        });

        return  View::make(
            'backend.user.list',
            array(
                'user' => $user
            ),
            compact('filter', 'grid')
        );
    }

    public function edit()
    {
        $user = User::find(Auth::id());

        if (Input::get('do_delete')==1) return  "not the first";

        $edit = DataEdit::source(new User);
        $edit->link("/dashboard/user/list", "User List", "TR");
        $edit->add('id','ID','text');
        $edit->add('email','Email','text');
        $edit->add('password','Password','text');
        $edit->add('confirmed','Activated','text');
        $edit->add('disabled','Disabled','text');
        $edit->add('key','Key','text');
        $edit->add('updated_at','Updated','text');
        $edit->add('created_at','Created','text');

        return  View::make(
            'backend.user.edit',
            array(
                'user' => $user
            ),
            compact('edit')
        );
    }

    public function passwordRequest()
    {
        // Can the user view the route?
        // are they logged in?
        if (Auth::id() > 0) return Redirect::action('DashboardController@dashboard');

        if (Request::isMethod('post'))
        {
            // validate the info, create rules for the inputs
            $rules = array(
                'email'    => 'required|email|min:6', // make sure the email is an actual email
            );

            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {
                // Test for a user with the specified email
                $user = User::where('email', Input::get('email'))->first();
                $GLOBALS['userId'] = $user->id;
                // Look for any password request made within the hour
                $passwordRequest = PasswordRequest::where(function($query) {
                    $query->where('created_at', '>', new DateTime("now - 1 hour"))
                        ->where('user_id', $GLOBALS['userId']);
                })->first();

                unset($GLOBALS['userId']);

                // Validate user
                if (
                    count($user) &&
                    (!is_null($user->confirmed) && $user->confirmed != '0000-00-00 00:00:00.000000') &&
                    (is_null($user->disabled) || $user->disabled == '0000-00-00 00:00:00.000000') &&
                    (!is_null($passwordRequest->created_at) && $passwordRequest->created_at > new DateTime("now + 1 hour"))
                ) {
                    // Create a new password reset entity
                    $passwordRequest = new PasswordRequest();
                    $passwordRequest->user_id = $user->id;
                    $passwordRequest->key = str_random(40);
                    $passwordRequest->save();

                    // Send Email
                    $data = array(
                        'passwordRequestLink' => URL::action('UserController@passwordGeneration', array($passwordRequest->key)),
                    );

                    Mail::send('emails.passwordrequest', $data, function($message)
                    {
                        $message->to(Input::get('email'))->subject('Password Request');
                    });
                }

                // Give a misleading message if the user isn't found
                Session::flash('message', 'Check your email inbox to complete the password request.');

                return Redirect::action('HomeController@showHome');
            }
        }

        return View::make('user.password', array(
            'noNavigation'=>true,
        ));
    }

    public function passwordGeneration($key = '') {
        // Filter input
        $key = preg_replace("/[^a-zA-Z0-9]+/", "", $key);

        // Find the password request
        $passwordRequest = PasswordRequest::where('key', $key)->firstOrFail();

        // DateTime Interval between to dates
        $dateTimeLimit = new DateTime("now - 1 hour");

        if (
            isset($passwordRequest) &&
            !$passwordRequest->used &&
            $passwordRequest->created_at > $dateTimeLimit
        ) {

            // Alter the database
            $newPassword = str_random(12);
            $passwordRequest->user->password = Hash::make($newPassword);
            $passwordRequest->user->save();
            $passwordRequest->used = true;
            $passwordRequest->save();

            $this->recipientEmailAddress = $passwordRequest->user->email;

            // Issue the password by mail
            $data = array(
                'newPassword' => $newPassword,
                'loginLink' => URL::action('UserController@login'),
            );

            Mail::send('emails.passwordnew', $data, function($message)
            {
                $message->to($this->recipientEmailAddress)->subject('New Password');
            });

            Session::flash('message', 'Check your email inbox for the new password.');

            return Redirect::action('HomeController@showHome');

        } else App::abort("404");
    }
}