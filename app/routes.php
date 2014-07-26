<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Filters
Route::filter('cache', function($route, $request, $response = null)
{
    $key = 'route-'.Str::slug(Request::url());
    if(is_null($response) && Cache::has($key))
    {
        return Cache::get($key);
    }
    elseif(!is_null($response) && !Cache::has($key))
    {
        Cache::put($key, $response->getContent(), 30);
    }
});

// Routes
//Route::get('/', 'HomeController@showHome');
Route::get('/', array('before' => 'cache', 'after' => 'cache', 'uses' => 'LandingController@index'));
Route::get('landing/index', array('before' => 'cache', 'after' => 'cache', 'uses' => 'LandingController@index'));


//Route::get('users', function()
//{
//    $users = User::all();
//
//    return View::make('users')->with('users', $users);
//});
//
//// route to show the login form
//
//// User controller routes
//Route::get('user/{id}/activation/{confirmationKey?}', array('uses' => 'UserController@activation'));
//Route::post('user/{id}/activation/{confirmationKey?}', array('before' => 'csrf', 'uses' => 'UserController@activation'));
//Route::get('user/{id}/cancellation/{key?}', array('uses' => 'UserController@cancellation'));
//Route::get('password', array('uses' => 'UserController@passwordRequest'));
//Route::post('password', array('uses' => 'UserController@passwordRequest'));
//Route::get('password/{key?}', array('uses' => 'UserController@passwordGeneration'));
//Route::post('signup', array('before' => 'csrf', 'uses' => 'UserController@signup'));
//Route::get('login', array('uses' => 'UserController@login'));
//Route::post('login', array('uses' => 'UserController@login'));
//Route::get('logout', array('uses' => 'UserController@logout'));
//Route::get('dashboard/user/list', array('uses' => 'UserController@listAll'));
//Route::get('dashboard/user/edit', array('uses' => 'UserController@edit'));
//Route::post('dashboard/user/edit', array('uses' => 'UserController@edit'));
//Route::delete('dashboard/user/edit', array('uses' => 'UserController@edit'));
//Route::patch('dashboard/user/edit', array('uses' => 'UserController@edit'));
//
//// Dashboard Controller Routes
//Route::get('dashboard', array('uses' => 'DashboardController@dashboard'));
//
//// Profile Controller Routes
//Route::get('dashboard/profile', array('uses' => 'ProfileController@index'));
//Route::get('dashboard/profile/view/{user_id?}', array('uses' => 'ProfileController@index'));
//Route::get('dashboard/profile/edit/{user_id?}', array('uses' => 'ProfileController@editProfile'));
//Route::post('dashboard/profile/edit/{user_id?}', array('uses' => 'ProfileController@editProfile'));
//Route::get('dashboard/profile/password/{user_id?}', array('uses' => 'ProfileController@editPassword'));
//Route::post('dashboard/profile/password/{user_id?}', array('uses' => 'ProfileController@editPassword'));
//Route::get('dashboard/profile/delete/{user_id?}', array('uses' => 'ProfileController@delete'));
//Route::post('dashboard/profile/delete/{user_id?}', array('uses' => 'ProfileController@delete'));
//
//// System Settings Controller
//Route::get('dashboard/system/settings', array('uses' => 'SystemSettingController@index'));
//
//// Organisation Controller
//Route::get('dashboard/organisation/', array('uses' => 'OrganisationController@organisationList'));
//Route::get('dashboard/organisation/list/', array('uses' => 'OrganisationController@organisationList'));
////Route::group(array('domain' => '{organisation}.prayerplanner.local'), function()
////{
////    Route::get('/', array('uses' => 'OrganisationController@view'));
////    Route::get('view/', array('uses' => 'OrganisationController@view'));
////});
//
//// Permission
//Entrust::routeNeedsPermission( 'dashboard/permission*', 'manage_roles', Redirect::to( action('DashboardController@dashboard') ));
//Route::get('dashboard/permission/', array('uses' => 'PermissionController@permissionManager'));
//Route::get('dashboard/permission/list/', array('uses' => 'PermissionController@permissionManager'));
//Route::post('dashboard/permission/role/create/', array('before' => 'csrf', 'uses' => 'PermissionController@createRole'));
//Route::post('dashboard/permission/permission/create/', array('before' => 'csrf', 'uses' => 'PermissionController@createPermission'));
//
//// Facebook Controller
//Route::get('facebook/request/auth/', array('uses' => 'FacebookController@requestAuthorisation'));
//Route::get('facebook/request/revoke/', array('before' => 'auth', 'uses' => 'FacebookController@revokeAuthorisation'));
//Route::get('facebook/get/auth/', array('uses' => 'FacebookController@redirectToAuthorisation'));
//Route::get('facebook/get/code/', array('uses' => 'FacebookController@receiveAuthorisationCode'));
//
//// rapyd-demo
//Route::controller('rapyd-demo', 'Zofe\\Rapyd\\Controllers\\DemoController');
//
//
//
///**
// * WhatIf.Local
// * Routes
// */
//Route::get('whatif/index/', 'WhatIfHomeController@index');