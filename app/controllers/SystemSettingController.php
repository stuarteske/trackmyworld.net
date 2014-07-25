<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 13/07/2014
 * Time: 14:38
 */

/**
 * Setting::set('foo', 'bar');
 * Setting::get('foo');
 * Setting::get('nested.element');
 * Setting::forget('foo');
 * $settings = Setting::all();
 */


class SystemSettingController extends BaseController {

    /**
     * Instantiate a new SystemSettingController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('auth', array());

        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function index($user_id = 0)
    {
        $user = User::find(Auth::id());

        return View::make(
            'backend.setting.index',
            array(
                'settings' => Setting::all(),
                'user' => $user,
            )
        );
    }
}
