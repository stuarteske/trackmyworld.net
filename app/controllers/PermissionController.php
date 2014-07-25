<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 22/07/2014
 * Time: 07:43
 */

class PermissionController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array(
            'except' => array(),
        ));

        $this->beforeFilter('csrf', array('on' => 'post'));

        // Register the 404
        App::error(function(ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        });
    }

    public function permissionManager()
    {
        $user = User::find(Auth::id());

        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();

        // Test for profile
        // Code...

        return View::make(
            'backend.permission.index',
            array(
                'user' => $user,
                'users' => $users,
                'usersForInputSelectBox' => User::toInputSelectArray($users),
                'roles' => $roles,
                'rolesForInputSelectBox' => Role::toInputSelectArray($roles),
                'permissions' => $permissions,
                'permissionsForInputSelectBox' => Permission::toInputSelectArray($permissions),
            )
        );
    }

    public function createRole() {

        // validate the info, create rules for the inputs
        $rules = array(
            'rolename'    => 'required|alpha_dash|unique:roles|min:4', // make sure the email is an actual email
            'permissions' => 'array', // password can only be alphanumeric and has to be greater than 3 characters
            'users' => 'array'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            Session::flash('message', 'Sorry, there was an error with your sign up request. Please check the form and try again.');

            return Redirect::back()
                ->withErrors($validator);
        } else {
            // Do the saving
            $newRole = new Role();
            $newRole->name = Input::get('rolename');
            $newRole->save();

            if (count(Input::get('permissions'))) {
                foreach(Input::get('permissions') as $permissionId) {

                    if ($permissionId) {
                        $newPermissionToRole = new PermissionToRole();
                        $newPermissionToRole->role_id = $newRole->id;
                        $newPermissionToRole->permission_id = $permissionId;
                        $newPermissionToRole->save();
                    }

                }
            }

            if (count(Input::get('users'))) {
                foreach(Input::get('users') as $userId) {

                    if ($userId) {
                        $newRoleAssigned = new AssignedRole();
                        $newRoleAssigned->role_id = $newRole->id;
                        $newRoleAssigned->user_id = $userId;
                        $newRoleAssigned->save();
                    }
                }
            }

            Session::flash('message', 'Success, the role has been saved.');

            return Redirect::back();
        }

    }

    public function createPermission() {
        // validate the info, create rules for the inputs
        $rules = array(
            'name'    => 'required|alpha_dash|unique:permissions|min:4', // make sure the email is an actual email
            'roles' => 'array',
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            Session::flash('message', 'Sorry, there was an error with your sign up request. Please check the form and try again.');

            return Redirect::back()
                ->withErrors($validator);
        } else {
            // Do the saving
            $newPermission = new Permission();
            $newPermission->name = strtolower(Input::get('name'));
            $newPermission->display_name = ucwords( str_replace(array('-','_'), ' ', $newPermission->name));
            $newPermission->save();

            if (count(Input::get('roles'))) {
                foreach(Input::get('roles') as $roleId) {

                    if ($roleId) {
                        $newPermissionToRole = new PermissionToRole();
                        $newPermissionToRole->role_id = $roleId;
                        $newPermissionToRole->permission_id = $newPermission->id;
                        $newPermissionToRole->save();
                    }

                }
            }

            Session::flash('message', 'Success, the permssion has been saved.');

            return Redirect::back();
        }

    }


}