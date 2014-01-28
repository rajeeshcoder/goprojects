@extends('dealer._layouts.default')
 
@section('main')
 
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>When</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($service_centers as $service_center)
                                <tr>
                                        <td>{{ $service_center->id }}</td>
                                        <td><a href="{{ URL::route('dealer.centers.bookings', $service_center->id) }}">{{ $service_center->title }}</a></td>
                                        <td>
                                        </td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
 
@stop