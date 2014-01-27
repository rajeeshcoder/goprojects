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
 
        {{ Form::open(array('route' => 'customer.bookings.postbook')) }}

                <div class="control-group">
                        {{ Form::label('profile', 'Select a Profile') }}
                        <div class="controls">
                            @foreach ($customer_profiles as $key => $profile)
                                <?php $checkvalue = $key == 0 ? 'true' : ''; ?>
                                {{ Form::radio('customer_profile', $profile->id, $checkvalue) }} {{$profile->title}}
                            @endforeach
                        </div>
                </div>


                <div class="control-group">
                        {{ Form::label('total_km', 'Total Run-in KiloMeter') }}
                        <div class="controls">
                                {{ Form::text('total_km') }}
                        </div>
                </div>


                <div class="control-group">
                        {{ Form::label('service_type', 'Service Type') }}
                        <div class="controls">
                                {{ Form::select('service_type', array('free' => 'Free', 'paid' => 'Paid', 'accident' => 'Accident', 'repair' => 'Repair')) }}
                        </div>
                </div>
                
                <div class="control-group">
                        {{ Form::label('service_dispatch', 'Delivery Type') }}
                        <div class="controls">
                                {{ Form::select('service_dispatch', array('pick-up' => 'Pick-Up', 'walk-in' => 'Walk-In')) }}
                        </div>
                </div>

                <div class="control-group">
                        {{ Form::label('service_date', 'Service Date') }}
                        <div class="controls">
                        {{ Form::text('service_date', '', array('id' => 'datepicker')) }}
                        </div>
                </div>       


                 <div class="form-actions">
                        {{ Form::submit('Book', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('customer.bookings.show') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop