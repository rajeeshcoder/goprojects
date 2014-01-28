@extends('customer._layouts.default')
 
@section('main')

<div id="register" class="register">

 {{ Form::open(array('url'=>'customer/register', 'class'=>'form-signup')) }}
    
   @if ($errors->has('register'))
     <div class="alert alert-error">{{ $errors->first('register', ':message') }}</div>
   @endif

        <div class="control-group">
                {{ Form::label('firstname', 'First Name') }}
                <div class="controls">
                        {{ Form::text('firstname') }}
                </div>
        </div>
        <div class="control-group">
                {{ Form::label('lastname', 'Last Name') }}
                <div class="controls">
                        {{ Form::text('lastname') }}
                </div>
        </div>
        <div class="control-group">
                {{ Form::label('email', 'Email') }}
                <div class="controls">
                        {{ Form::text('email') }}
                </div>
        </div>

        <div class="control-group">
                {{ Form::label('password', 'Password') }}
                <div class="controls">
                        {{ Form::password('password') }}
                </div>
        </div>	

        <div class="control-group">
                {{ Form::label('password_cofirmation', 'Confirm Password') }}
                <div class="controls">
                        {{ Form::password('password_confirmation') }}
                </div>
        </div>

        <div class="form-actions">
                {{ Form::submit('Register', array('class' => 'btn btn-inverse btn-login')) }}
        </div>
{{ Form::close() }}

</div>
@stop