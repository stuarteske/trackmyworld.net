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
User Profile
@stop

@section('breadcrumb')
<li class=""><a href="{{ URL::action('DashboardController@dashboard') }}">Dashboard</a></li>
<li class="active">User Profile</li>
@stop

@section('content')
<section class="col-lg-6">
    <div class="box box-info">
        <div class="box-body no-padding">
            <table class="table">
                <tbody><tr>
                    <th style="width: 100px">Label</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Screen Name</td>
                    <td>{{{ $user->profile->screenname }}}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{{ $user->profile->name }}}</td>
                </tr>
                <tr>
                    <td>Job Title</td>
                    <td>{{{ $user->profile->jobtitle }}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{{ $user->email }}}</td>
                </tr>
                <tr>
                    <td>Activated</td>
                    <td>{{{ $user->confirmed }}}</td>
                </tr>
                <tr>
                    <td>Disabled</td>
                    <td>{{{ $user->disabled }}}</td>
                </tr>
                <tr>
                    <td>Updated</td>
                    <td>{{{ $user->updated_at }}}</td>
                </tr>
                <tr>
                    <td>Created</td>
                    <td>{{{ $user->created_at }}}</td>
                </tr>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div>

    <p>
        <a href="{{ URL::action('ProfileController@editProfile') }}" class="btn btn-default">Edit Profile</a>
        <a href="{{ URL::action('ProfileController@editPassword') }}" class="btn btn-default">Change Password</a>
        <a href="{{ URL::action('ProfileController@delete') }}" class="btn btn-danger">Delete Account</a>
    </p>

    <p>
        <a class="btn btn-social btn-twitter">
            <i class="fa fa-twitter"></i> Link with Twitter
        </a>
        @if ($linkedFacebook)
        <a href="{{ action('FacebookController@revokeAuthorisation'); }}" class="btn btn-social btn-facebook">
            <i class="fa fa-facebook"></i> Unlink Facebook
        </a>
        @else
        <a href="{{ action('FacebookController@requestAuthorisation'); }}" class="btn btn-social btn-facebook">
            <i class="fa fa-facebook"></i> Link with Facebook
        </a>
        @endif
        <a class="btn btn-social btn-google-plus">
            <i class="fa fa-google-plus"></i> Link with Google
        </a>
    </p>
</section>
@stop