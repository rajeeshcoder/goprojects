@extends('customer._layouts.default')
 
@section('main')
 
        <h2>Edit Profile</h2>
        
        {{ Notification::showAll() }}
 
        @if ($errors->any())
        <div class="alert alert-error">
                {{ implode('<br>', $errors->all()) }}
        </div>
        @endif
 
       
        {{ Form::model($booking, array('method' => 'put', 'route' => array('customer.vehicles.update', $booking->id))) }}
 
               <div class="control-group">
                    Manufacturer : <b>{{ $vehicle->model->manufacturer->title }}</b>
                </div>

                <div class="control-group">
                        {{ Form::label('model', 'Model') }}
                        <div class="controls">
                               {{ Form::select('model', $model, $model_id) }}                 
                        </div>
                </div>
   
                <div class="control-group">
                        {{ Form::label('reg_no', 'Registration No') }}
                        <div class="controls">
                                {{ Form::text('reg_no') }}
                        </div>
                </div>


                <div class="control-group">
                        {{ Form::label('engine_no', 'Engine No') }}
                        <div class="controls">
                                {{ Form::text('engine_no') }}
                        </div>
                </div>
                
                 <div class="control-group">
                        {{ Form::label('chasis_no', 'Chasis No') }}
                        <div class="controls">
                                {{ Form::text('chasis_no') }}
                        </div>
                </div>        

                <div class="control-group">
                        {{ Form::label('color', 'Color') }}
                        <div class="controls">
                                {{ Form::text('color') }}
                        </div>
                </div>
    

                 <div class="control-group">
                        {{ Form::label('regdate', 'Registration Date') }}
                        <div class="controls">
                        {{ Form::text('regdate', Input::old('regdate'), array("id" => "datepicker"))  }} 
                        </div>
                </div>       
                 

                <div class="form-actions">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('customer.vehicles.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop