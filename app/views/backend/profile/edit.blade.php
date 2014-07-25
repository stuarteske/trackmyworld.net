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
Edit Profile
@stop

@section('breadcrumb')
<li><a href="{{ URL::action('DashboardController@dashboard') }}">Dashboard</a></li>
<li><a href="{{ URL::action('ProfileController@index') }}">User Profile</a></li>
<li class="active">Edit Profile</li>
@stop

@section('content')
<section class="col-lg-6">
    <div class="box box-info">
        <div class="box-body">
            {{ Form::open(array('class' => 'form-horizontal', 'role' => 'form' )) }}

            <div class="form-group @if ($errors->first('screenname')) has-error has-feedback @endif ">
                {{ Form::label('screenname', 'Screen name', array('class' => 'col-sm-3 control-label')) }}
                <div class="col-sm-9">
                    {{ Form::text('screenname', $user->profile->screenname, array('class' => 'form-control', 'placeholder' => '')) }}
                    @if ($errors->first('screenname'))
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <p class="text-danger">{{ $errors->first('screenname') }}</p>
                    @endif
                </div>
            </div>

            <div class="form-group @if ($errors->first('name')) has-error has-feedback @endif ">
                {{ Form::label('name', 'Full Name', array('class' => 'col-sm-3 control-label')) }}
                <div class="col-sm-9">
                    {{ Form::text('name', $user->profile->name, array('class' => 'form-control', 'placeholder' => '')) }}
                    @if ($errors->first('name'))
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>

            <div class="form-group @if ($errors->first('jobtitle')) has-error has-feedback @endif ">
                {{ Form::label('jobtitle', 'Job Title', array('class' => 'col-sm-3 control-label')) }}
                <div class="col-sm-9">
                    {{ Form::text('jobtitle', $user->profile->jobtitle, array('class' => 'form-control', 'placeholder' => '')) }}
                    @if ($errors->first('jobtitle'))
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <p class="text-danger">{{ $errors->first('jobtitle') }}</p>
                    @endif
                </div>
            </div>

            {{ Form::token() }}

            <div class="form-group" style="text-align: left;">
                <div class="col-sm-offset-3 col-sm-9">
                    {{ Form::submit('Save', array('class' => 'btn btn-info')) }}
                </div>
            </div>

            {{ Form::close() }}
        </div><!-- /.box-body -->
    </div>
</section>
@stop