@extends('customer._layouts.default')
 
@section('main')
<h2 class="form-signup-heading">Please Register</h2>

<div id="login" class="login">

 {{ Form::open(array('url'=>'customer/register', 'class'=>'form-signup')) }}
    
   @if ($errors->has('register'))
     <div class="alert alert-error">{{ $errors->first('register', ':message') }}</div>
   @endif
 
 
   {{ Form::text('firstname', null, array('class'=>'input-block-level', 'placeholder'=>'First Name')) }}
   {{ Form::text('lastname', null, array('class'=>'input-block-level', 'placeholder'=>'Last Name')) }}
   {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
   {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
   {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}
 
   {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}
</div>
@stop