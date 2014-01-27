@extends('customer._layouts.default')
 
@section('main')
 
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th>#</th>
                                <th>Location</th>
                                <th>Dealer</th>
                                <th>When</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($service_centers as $service_center)
                                <tr>
                                        <td>{{ $service_center->id }}</td>
                                        <td>{{ $service_center->dealer->title }}</td>
                                        <td>{{ $service_center->created_at }}</td>
                                        <td>
                                                <a href="{{ URL::route('customer.bookings.book', $service_center->id) }}" class="btn btn-pri btn-large pull-right">Book</a>
                                        </td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
 
@stop