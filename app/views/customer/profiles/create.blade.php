@extends('customer._layouts.default')
 
@section('main')
 
        <div class="jumbotron">
            <h3>Create a new Profile</h3>
        </div>

        {{ Notification::showAll() }}
 
        @if ($errors->any())
        <div class="alert alert-error">
                {{ implode('<br>', $errors->all()) }}
        </div>
        @endif
 
        {{ Form::open(array('route' => 'customer.profiles.store')) }}

                <div class="control-group">
                        {{ Form::label('title', 'Title') }}
                        <div class="controls">
                                {{ Form::text('title') }}
                        </div>
                </div>
               

                <div class="control-group">
                        {{ Form::label('primary_phone', 'Primary Phone') }}
                        <div class="controls">
                                {{ Form::text('primary_phone') }}
                        </div>
                </div>
                
                 <div class="control-group">
                        {{ Form::label('secondary_phone', 'Secondary Phone') }}
                        <div class="controls">
                                {{ Form::text('secondary_phone') }}
                        </div>
                </div>        

                 <div class="control-group">
                        {{ Form::label('address', 'Address') }}
                        <div class="controls">
                                {{ Form::textarea('address') }}
                        </div>
                </div>       

                <div class="control-group">
                        {{ Form::label('city', 'City') }}
                        <div class="controls">
                                {{ Form::text('city') }}
                        </div>
                </div>

                <div class="control-group">
                        {{ Form::label('state', 'State') }}
                        <div class="controls">
                                {{ Form::text('state') }}
                        </div>
                </div>


                <div class="form-actions">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('customer.profiles.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop