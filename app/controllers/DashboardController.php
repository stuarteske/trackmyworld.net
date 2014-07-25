<?php
/**
 * Created by PhpStorm.
 * User: cfa
 * Date: 08/07/2014
 * Time: 07:39
 */

class DashboardController extends BaseController {

    /**
     * Instantiate Controller.
     */
    public function __construct()
    {
        $this->beforeFilter('auth', array());

        $this->beforeFilter('csrf', array('on' => 'post'));
    }


    public function dashboard()
    {
        // is the user confirmed
        // is the user blocked
        // Is the id the same and the user::id

        /** @var User $user */
        // Find the user
        $user = User::find(Auth::id());

        if (!is_null($user->confirmed))
            return View::make( 'backend.show', array( 'user' => $user) );
        else return Redirect::action('UserController@activation', array('id' => Auth::id()));
    }
}