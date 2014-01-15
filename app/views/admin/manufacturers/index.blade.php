@extends('admin._layouts.default')
 
@section('main')
 
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>When</th>
                                <th><a href="{{ URL::route('admin.manufacturers.create') }}"><i class="icon-cog"></i></a></th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($manufacturers as $manufacturer)
                                <tr>
                                        <td>{{ $manufacturer->id }}</td>
                                        <td><a href="{{ URL::route('admin.manufacturers.show', $manufacturer->id) }}">{{ $manufacturer->title }}</a></td>
                                        <td>{{ $manufacturer->created_at }}</td>
                                        <td>
                                                <a href="{{ URL::route('admin.manufacturers.edit', $manufacturer->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
                                                {{ Form::open(array('route' => array('admin.manufacturers.destroy', $manufacturer->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                                                        <button type="submit" href="{{ URL::route('admin.manufacturers.destroy', $manufacturer->id) }}" class="btn btn-danger btn-mini">Delete</butfon>
                                                {{ Form::close() }}
                                        </td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
 
@stop