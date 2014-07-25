@extends('layouts.front')

@section('site_title')
Account Activation
@stop

@section('content')
<section class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h1 class="brand-heading">Activation</h1>
                    <p class="intro-text">Enter your activation key below.</p>
                    {{ Form::open(array('method' => 'post', 'style' => 'text-align:left;', 'role' => 'form' )) }}

                        <div class="form-group @if ($errors->first('confirmkey')) has-error has-feedback @endif ">
                            {{ Form::label('confirmkey', 'Activation Key', array('class' => 'control-label')) }}
                            {{ Form::text('confirmkey', Input::old('confirmkey'), array('class' => 'form-control', 'placeholder' => '')) }}
                            @if ($errors->first('confirmkey'))
                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                            <p class="text-danger">{{ $errors->first('confirmkey') }}</p>
                            @endif
                        </div>

                        {{ Form::token() }}

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

