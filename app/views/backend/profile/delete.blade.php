<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 13/07/2014
 * Time: 15:08
 */
?>

@extends('layouts.backend')

@section('site_title')
Delete Account
@stop

@section('breadcrumb')
<li><a href="{{ URL::action('DashboardController@dashboard') }}">Dashboard</a></li>
<li><a href="{{ URL::action('ProfileController@index') }}">User Profile</a></li>
<li class="active">Delete Account</li>
@stop

@section('content')
<section class="col-lg-6">
    <div class="box box-danger">
        <div class="box-body">
            <p>If you wish to delete your account, please confirm by the action by typing "{{{ $user->email }}}" into the field provided and press the delete account button.</p>

            <hr />

            {{ Form::open(array('class' => 'form-horizontal', 'role' => 'form' )) }}

            <div class="form-group @if ($errors->first('email')) has-error has-feedback @endif ">
                {{ Form::label('email', 'Email Address', array('class' => 'col-sm-3 control-label')) }}
                <div class="col-sm-9">
                    {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'email@example.com')) }}
                    @if ($errors->first('email'))
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
            </div>

            {{ Form::token() }}

            <div class="form-group" style="text-align: left;">
                <div class="col-sm-offset-3 col-sm-9">
                    {{ Form::submit('Delete Account', array('class' => 'btn btn-danger')) }}
                </div>
            </div>

            {{ Form::close() }}
        </div><!-- /.box-body -->
    </div>
</section>
@stop