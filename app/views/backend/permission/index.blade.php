<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 07/07/2014
 * Time: 18:57
 */
?>

@extends('layouts.backend')

@section('site_title')
Permission Manager
@stop

@section('breadcrumb')
<li class=""><a href="{{ URL::action('DashboardController@dashboard') }}">Dashboard</a></li>
<li class="active">Roles List</li>
@stop

@section('content')
<section class="col-lg-6">

    @if ($user->can("manage_roles"))
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Create Role</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body" style="display: block;">
            {{ Form::open(array('action' => 'PermissionController@createRole', 'method' => 'post', 'role' => 'form', 'id' => 'role-creation' )) }}
                <div class="row">


                    <div class="form-group col-xs-4">
                        <label>Role Name</label>
                        <input type="text" class="form-control" name="rolename" value="{{ Input::old('rolename') }}" placeholder="Admin">
                        @if ($errors->first('rolename'))
                        <p class="text-danger">{{ $errors->first('rolename') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-xs-4">
                        <label>Permission List</label>
                        {{ Form::select('permissions[]', $permissionsForInputSelectBox, Input::old('permissions[]'), array('class' => 'form-control', 'multiple' => true)); }}
                        @if ($errors->first('permissions'))
                        <p class="text-danger">{{ $errors->first('permissions') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-xs-4">
                        <label>User List</label>
                        {{ Form::select('users[]', $usersForInputSelectBox, Input::old('users[]'), array('class' => 'form-control', 'multiple' => true)); }}
                        @if ($errors->first('users'))
                        <p class="text-danger">{{ $errors->first('users') }}</p>
                        @endif
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            {{ Form::close() }}
        </div><!-- /.box-body -->
    </div>
    @endif

    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Role List</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Users</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{{ $role->name }}}</td>
                        <td>
                            @foreach ($role->perms as $rolePermission)
                                &bull; {{{ $rolePermission->display_name }}} <br />
                            @endforeach
                        </td>
                        <td>
                            @foreach ($role->users as $roleUser)
                                &bull; {{{ $roleUser->email }}} <br />
                            @endforeach
                        </td>
                        <td>
<!--                            <a href="#"><i class="fa fa-edit"></i></a>-->
                            <a href="#"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div>
</section>

<section class="col-lg-6">

    @if ($user->can("manage_permissions"))
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Create Permission</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body" style="display: block;">
            {{ Form::open(array('action' => 'PermissionController@createPermission', 'method' => 'post', 'role' => 'form', 'id' => 'permission-creation' )) }}
                <div class="row">

                    <div class="form-group col-xs-6">
                        <label>Permission Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                        @if ($errors->first('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-xs-6">
                        <label>Role List</label>
                        {{ Form::select('roles[]', $rolesForInputSelectBox, null, array('class' => 'form-control', 'multiple' => true)); }}
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            {{ Form::close() }}
        </div><!-- /.box-body -->
    </div>
    @endif

    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Permission List</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
                @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{{ $permission->display_name }}}</td>
                    <td>
                        @foreach ($permission->roles as $permissionRole)
                            &bull; {{{ $permissionRole->name }}} <br />
                        @endforeach
                    </td>
                    <td>
<!--                        <a href="#"><i class="fa fa-edit"></i></a>-->
                        <a href="#"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div>
</section>

@stop