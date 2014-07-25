<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 14/07/2014
 * Time: 18:45
 */
?>

@extends('layouts.front')

@section('site_title')
Password Request
@stop

@section('content')
<section class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h1 class="brand-heading">Password Request</h1>
                    <p class="intro-text">Make a password request by entering your email below.</p>

                    {{ Form::open(array('style' => 'text-align:left;', 'role' => 'form' )) }}

                    <div class="form-group @if ($errors->first('email')) has-error has-feedback @endif ">
                        {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                        {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'example@example.com')) }}
                        @if ($errors->first('email'))
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="form-group" style="text-align: left;">
                        <div class="">
                            {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</section>
@stop