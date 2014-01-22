@extends('admin._layouts.default')
 
@section('main')
 
        <h2>Edit service_center</h2>
        
        {{ Notification::showAll() }}
 
        @if ($errors->any())
        <div class="alert alert-error">
                {{ implode('<br>', $errors->all()) }}
        </div>
        @endif
 
        {{ Form::model($service_center, array('method' => 'put', 'route' => array('admin.service_centers.update', $service_center->id))) }}
 
                <div class="control-group">
                        {{ Form::label('title', 'Title') }}
                        <div class="controls">
                                {{ Form::text('title') }}
                        </div>
                </div>

                <div class="control-group">
                        {{ Form::label('dealer', 'Dealer') }}
                        <div class="controls">
                                {{ Form::select('dealer', $dealer, $dealer_id) }}                
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
                        <a href="{{ URL::route('admin.service_centers.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop