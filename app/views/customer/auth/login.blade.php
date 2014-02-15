@extends('customer._layouts.default')
@section('main')
<div class="row">
   <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
            </div>

                {{ Form::open(array('url'=>'customer/login', 'role'=>'form')) }}
                @if ($errors->has('login'))
                        <div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>
                @endif
                <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::text('email', null, array('size' => '20', 'placeholder' => 'Enter email', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', array('placeholder' => 'Enter password', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                        {{ Form::submit('Login', array('class' => 'btn btn-default')) }}
                </div>
                {{ Form::close() }}
        </div>
   </div>
</div>
@stop