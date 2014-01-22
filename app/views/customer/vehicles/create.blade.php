@extends('customer._layouts.default')
 
@section('main')
 
        <div class="jumbotron">
            <h3>Create a new Vehicle</h3>
        </div>

        {{ Notification::showAll() }}
 
        @if ($errors->any())
        <div class="alert alert-error">
                {{ implode('<br>', $errors->all()) }}
        </div>
        @endif
 
        {{ Form::open(array('route' => 'customer.vehicles.store')) }}


               <div class="control-group">
                        {{ Form::label('manufacturer', 'Manufacturer') }}
                        <div class="controls">
                                {{ Form::select('manufacturer', $manufacturer) }}                
                        </div>
                </div>
`
                <div class="control-group">
                        {{ Form::label('model', 'Model') }}
                        <div class="controls">
                                {{ Form::select('model', []) }}                
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
                        {{ Form::text('regdate', '', array('id' => 'datepicker')) }}
                        </div>
                </div>       


                <div class="form-actions">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('customer.vehicles.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop