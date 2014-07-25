<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 13/07/2014
 * Time: 14:41
 */
?>

@extends('layouts.backend')

@section('site_title')
System Settings
@stop

@section('breadcrumb')
<li class="{{ URL::action('DashboardController@dashboard') }}"><a href="">Dashboard</a></li>
<li class="active">System Settings</li>
@stop

@section('content')
<section class="col-lg-6">
    <section class="col-lg-6">
        <div class="box box-info">
            <div class="box-body no-padding">
                <table class="table">
                    <tbody><tr>
                        <th style="width: 100px">Setting</th>
                        <th>Value</th>
                    </tr>

                    @foreach ($settings as $key => $value)
                    <tr>
                        <td>{{{ $key }}}</td>
                        <td>{{{ $value }}}</td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div>

        <!--<p>
            <button class="btn btn-default">Edit Profile</button>
            <button class="btn btn-default">Change Password</button>
            <button class="btn btn-danger">Delete Account</button>
        </p>-->
</section>
@stop