@if (!Auth::check())
<section id="signup" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">

            <h2>Signup</h2>

            {{ Form::open(array('url' => 'signup', 'class' => 'form-horizontal', 'role' => 'form' )) }}

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

            <div class="form-group @if ($errors->first('password')) has-error has-feedback @endif">
                {{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
                <div class="col-sm-9">
                    {{ Form::password('password', array('class' => 'form-control')) }}
                    @if ($errors->first('password'))
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <p class="text-danger">{{ $errors->first('password') }}</p>
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
                    {{ Form::submit('Sign Up', array('class' => 'btn btn-default')) }}
                    <a href="{{ action('FacebookController@requestAuthorisation'); }}" class="btn btn-default">
                        <i class="fa fa-facebook"></i> Signup with Facebook
                    </a>
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</section>
@endif