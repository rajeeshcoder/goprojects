@extends('admin._layouts.default')
 
@section('main')
 
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Dealer</th>
                                <th>When</th>
                                <th><a href="{{ URL::route('admin.service_centers.create') }}" class="btn btn-primary btn-default pull-left">Create</a></th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($service_centers as $service_center)
                                <tr>
                                        <td>{{ $service_center->id }}</td>
                                        <td><a href="{{ URL::route('admin.service_centers.show', $service_center->id) }}">{{ $service_center->title }}</a></td>
                                        <td>{{ $service_center->dealer->title }}</td>
                                        <td>{{ $service_center->created_at }}</td>
                                        <td>
                                                <a href="{{ URL::route('admin.service_centers.edit', $service_center->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
                                                {{ Form::open(array('route' => array('admin.service_centers.destroy', $service_center->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                                                        <button type="submit" href="{{ URL::route('admin.service_centers.destroy', $service_center->id) }}" class="btn btn-danger btn-mini">Delete</butfon>
                                                {{ Form::close() }}
                                        </td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
 
@stop