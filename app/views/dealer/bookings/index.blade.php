@extends('dealer._layouts.default')
 
@section('main')
 
<table class="table table-striped">
<thead>
        <tr>
                <th>#</th>
                <th>Current Status</th>
                <th>Dealer</th>
                <th>Location</th>
                <th>Model</th>
                <th>Vehicle</th>
                <th>Service Date</th>
        </tr>
</thead>
<tbody>
@foreach ($bookings as $booking)
        <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $status_msg["$booking->id"]->title }}</td>
                <td>{{ $booking->servicecenter->dealer->title }}</td>
                <td>{{ $booking->servicecenter->title }}</td>
                <td>{{ $booking->customervehicle->model->title }}</td>
                <td>{{ $booking->customervehicle->reg_no }}</td>
                <td>{{ $booking->servicedate }}</td>
                        @if( $buttons[$booking->id] && sizeof($buttons[$booking->id]) > 1)
                                @foreach($buttons[$booking->id] as $button)
                                        <td>
                                        @if(preg_match("/cancel/i", $button, $match)) 
                                                {{ Form::open(array('route' => array('dealer.bookings.destroy', $booking->id), 'method' => 'delete', 'data-confirm' => 'Are you sure to cancel this booking?')) }}
                                                        <button type="submit" href="{{ URL::route('dealer.bookings.destroy', $booking->id) }}" class="btn btn-danger btn-mini">Cancel</button>
                                                {{ Form::close() }}
                                        @elseif(preg_match("/approve/i", $button, $match)) 
                                                {{ Form::open(array('route' => array('dealer.bookings.approve', $booking->id), 'method' => 'get', 'data-confirm' => 'Are you sure to Confirm this booking?')) }}
                                                        <button type="submit" href="{{ URL::route('dealer.bookings.approve', $booking->id) }}" class="btn btn-success btn-mini">Approve</button>
                                                {{ Form::close() }}       
                                        @else              
                                                <a href="{{ URL::route("dealer.bookings.edit", $booking->id) }}" class="btn btn-info btn-small">{{ $button }}</a>
                                        @endif
                                 </td>       
                                @endforeach
                        @endif                
                
        </tr>
@endforeach
</tbody>
</table>

@stop