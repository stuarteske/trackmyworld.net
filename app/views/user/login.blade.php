<?php
// TODO: social network login
// TODO: Sign up hint
// todo: forgotten password
// todo: email notifications
?>

@extends('layouts.front-login')

@section('site_title')
Login
@stop

@section('content')
<section class="intro">
    <div class="intro-body">

        <div class="container">
            <div id="loginbox" style="margin-top:50px;text-align:left;color:#ccc;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{ action('UserController@passwordRequest'); }}">Forgot password?</a></div>
                    </div>

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        {{ Form::open(array('action' => 'UserController@login', 'style' => 'text-align:left;', 'role' => 'form', 'class' => 'form-horizontal', 'id' => 'loginform' )) }}

                            <div  style="margin: 0px 0px 25px 0px;" class="input-group form-group @if ($errors->first('email')) has-error has-feedback @endif ">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                {{ Form::text('email', Input::old('email'), array('id' => 'login-username', 'class' => 'form-control', 'placeholder' => 'email')) }}
                                @if ($errors->first('email'))
                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <div style="margin: 0px 0px 25px 0px;" class="input-group form-group @if ($errors->first('passsword')) has-error has-feedback @endif ">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                {{ Form::password('password', array('id'=>'login-password ', 'class' => 'form-control', 'placeholder' => 'password')) }}
                                @if ($errors->first('password'))
                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                    </label>
                                </div>
                            </div>

                            <div class="form-group" style="margin-top:10px">
                                <div class="col-sm-12 controls">
                                    {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
                                    <a id="btn-fblogin" href="{{ action('FacebookController@requestAuthorisation'); }}" class="btn btn-primary"><i class="fa fa-facebook"></i> Login with Facebook</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                        Don't have an account!
                                        <a href="/#signup">
                                            Sign Up Here
                                        </a>
                                    </div>
                                </div>
                            </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>


            </div>
        </div>

    </div>
</section>
@stop

