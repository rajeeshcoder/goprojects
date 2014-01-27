@extends('customer._layouts.default')
 
@section('main')
 
<table class="table table-striped">
<thead>
        <tr>
                <th>#</th>
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
                <td>{{ $booking->servicecenter->dealer->title }}</td>
                <td>{{ $booking->servicecenter->title }}</td>
                <td>{{ $booking->customervehicle->model->title }}</td>
                <td>{{ $booking->customervehicle->reg_no }}</td>
                <td>{{ $booking->servicedate }}</td>
                <td>
                        @foreach($buttons["$booking->id"] as $button)
                                <a href="{{ URL::route("customer.bookings.$button", $booking->id) }}" class="btn btn-pri btn-small pull-right">{{ $button }}</a>
                                {{ $button }}
                        @endforeach

                </td>
        </tr>
@endforeach
</tbody>
</table>

@stop