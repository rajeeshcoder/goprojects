@extends('admin._layouts.default')
 
@section('main')
 
        <h2>Create new page</h2>

        {{ Notification::showAll() }}
 
        @if ($errors->any())
        <div class="alert alert-error">
                {{ implode('<br>', $errors->all()) }}
        </div>
        @endif
 
 
        {{ Form::open(array('route' => 'admin.service_centers.store')) }}
 
                <div class="control-group">
                        {{ Form::label('title', 'Title') }}
                        <div class="controls">
                                {{ Form::text('title') }}
                        </div>
                </div>
                
                <div class="control-group">
                        {{ Form::label('dealer', 'Dealer') }}
                        <div class="controls">
                                {{ Form::select('dealer', $dealer) }}                
                        </div>
                </div>


                <div class="control-group">
                        {{ Form::label('location', 'Location') }}
                        <div class="controls">
                                {{ Form::text('location') }}
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
                        <a href="{{ URL::route('admin.dealers.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop