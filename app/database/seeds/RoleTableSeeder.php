<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 21/07/2014
 * Time: 22:16
 */

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();
        DB::table('permissions')->delete();
        DB::table('permission_role')->delete();
        DB::table('assigned_roles')->delete();

        // Roles
        $roleDeveloper = Role::create(array(
            'name' => 'Developer',
        ));
        AssignedRole::create(array(
            'user_id' => 1,
            'role_id' => $roleDeveloper->id
        ));

        $roleAdmin = Role::create(array(
            'name' => 'Admin',
        ));
        AssignedRole::create(array(
            'user_id' => 4,
            'role_id' => $roleAdmin->id
        ));

        $roleManager = Role::create(array(
            'name' => 'Manager',
        ));
        AssignedRole::create(array(
            'user_id' => 5,
            'role_id' => $roleManager->id
        ));

        $roleConsultant = Role::create(array(
            'name' => 'Consultant',
        ));
        AssignedRole::create(array(
            'user_id' => 6,
            'role_id' => $roleConsultant->id
        ));

        $roleEditor = Role::create(array(
            'name' => 'Editor',
        ));
        AssignedRole::create(array(
            'user_id' => 7,
            'role_id' => $roleEditor->id
        ));

        $roleSeo = Role::create(array(
            'name' => 'SeoManager',
        ));
        AssignedRole::create(array(
            'user_id' => 8,
            'role_id' => $roleSeo->id
        ));

        $roleCustomer = Role::create(array(
            'name' => 'Customer',
        ));
        AssignedRole::create(array(
            'user_id' => 9,
            'role_id' => $roleCustomer->id
        ));

        // Permissions
        $permission = Permission::create(array(
            'name' => 'manage_roles',
            'display_name' => 'Manage Roles',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));

        $permission = Permission::create(array(
            'name' => 'manage_assigned_roles',
            'display_name' => 'Manage Role Assignment',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));

        $permission = Permission::create(array(
            'name' => 'manage_organisations',
            'display_name' => 'Manage Organisations',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));

        $permission = Permission::create(array(
            'name' => 'manage_password_reminders',
            'display_name' => 'Manage Password Reminders',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));

        $permission = Permission::create(array(
            'name' => 'manage_password_requests',
            'display_name' => 'Manage Password Requests',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));

        $permission = Permission::create(array(
            'name' => 'manage_permissions',
            'display_name' => 'Manage Permissions',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));

        $permission = Permission::create(array(
            'name' => 'manage_planners',
            'display_name' => 'Manage Planners',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));

        $permission = Permission::create(array(
            'name' => 'manage_profiles',
            'display_name' => 'Manage Profiles',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));

        $permission = Permission::create(array(
            'name' => 'manage_sessions',
            'display_name' => 'Manage Sessions',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));

        $permission = Permission::create(array(
            'name' => 'manage_settings',
            'display_name' => 'Manage Settings',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));

        $permission = Permission::create(array(
            'name' => 'manage_social_accounts',
            'display_name' => 'Manage Social Connections',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));

        $permission = Permission::create(array(
            'name' => 'manage_users',
            'display_name' => 'Manage Users',
        ));
        PermissionToRole::create(array(
            'permission_id' => $permission->id,
            'role_id' => $roleDeveloper->id
        ));
    }

}