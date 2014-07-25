<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 11/07/2014
 * Time: 18:52
 */
?>

@extends('layouts.backend')

@section('site_title')
Edit Password
@stop

@section('breadcrumb')
<li><a href="{{ URL::action('DashboardController@dashboard') }}">Dashboard</a></li>
<li><a href="{{ URL::action('ProfileController@index') }}">User Profile</a></li>
<li class="active">Edit Password</li>
@stop

@section('content')
<section class="col-lg-6">
    <div class="box box-info">
        <div class="box-body">
            {{ Form::open(array('class' => 'form-horizontal', 'role' => 'form' )) }}

            <div class="form-group @if ($errors->first('new-password')) has-error has-feedback @endif">
                {{ Form::label('new-password', 'New Password', array('class' => 'col-sm-3 control-label')) }}
                <div class="col-sm-9">
                    {{ Form::password('new-password', array('class' => 'form-control')) }}
                    @if ($errors->first('new-password'))
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <p class="text-danger">{{ $errors->first('new-password') }}</p>
                    @endif
                </div>
            </div>

            <div class="form-group @if ($errors->first('repeat-password')) has-error has-feedback @endif">
                {{ Form::label('repeat-password', 'Repeat Password', array('class' => 'col-sm-3 control-label')) }}
                <div class="col-sm-9">
                    {{ Form::password('repeat-password', array('class' => 'form-control')) }}
                    @if ($errors->first('repeat-password'))
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <p class="text-danger">{{ $errors->first('repeat-password') }}</p>
                    @endif
                </div>
            </div>

            {{ Form::token() }}

            <div class="form-group" style="text-align: left;">
                <div class="col-sm-offset-3 col-sm-9">
                    {{ Form::submit('Save Password', array('class' => 'btn btn-info')) }}
                </div>
            </div>

            {{ Form::close() }}
        </div><!-- /.box-body -->
    </div>
</section>
@stop