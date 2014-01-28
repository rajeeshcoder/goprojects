@extends('dealer._layouts.default')
 
@section('main')
 
        <div class="jumbotron">
            <h3>Modify the current Booking</h3>
        </div>

        {{ Notification::showAll() }}
 
        @if ($errors->any())
        <div class="alert alert-error">
                {{ implode('<br>', $errors->all()) }}
        </div>
        @endif
 
         {{ Form::model($booking, array('method' => 'put', 'route' => array('dealer.bookings.update', $booking->id))) }}

                <div class="control-group">
                        {{ Form::label('total_km', 'Total Run-in KiloMeter') }}
                        <div class="controls">
                                {{ Form::text('total_km') }}
                        </div>
                </div>

                <div class="control-group">
                        {{ Form::label('service_type', 'Service Type') }}
                        <div class="controls">
                                {{ Form::select('service_type', array('free' => 'Free', 'paid' => 'Paid', 'accident' => 'Accident', 'repair' => 'Repair'), $booking->service_type) }}
                        </div>
                </div>
                
                <div class="control-group">
                        {{ Form::label('service_dispatch', 'Delivery Type') }}
                        <div class="controls">
                                {{ Form::select('service_dispatch', array('pick-up' => 'Pick-Up', 'walk-in' => 'Walk-In'), $booking->service_dispatch ) }}
                        </div>
                </div>

                <div class="control-group">
                        {{ Form::label('servicedate', 'Service Date') }}
                        <div class="controls">
                        {{ Form::text('servicedate',  Input::old('servicedate'), array('id' => 'datepicker')) }}
                        </div>
                </div>       

                 <div class="form-actions">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('dealer.bookings.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop