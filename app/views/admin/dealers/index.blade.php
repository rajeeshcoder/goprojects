@extends('admin._layouts.default')
 
@section('main')
 
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Manufacturer</th>
                                <th>When</th>
                                <th><a href="{{ URL::route('admin.dealers.create') }}"><i class="icon-cog"></i></a></th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($dealers as $dealer)
                                <tr>
                                        <td>{{ $dealer->id }}</td>
                                        <td><a href="{{ URL::route('admin.dealers.show', $dealer->id) }}">{{ $dealer->title }}</a></td>
                                        <td>{{ $dealer->manufacturer->title }}</td>
                                        <td>{{ $dealer->created_at }}</td>
                                        <td>
                                                <a href="{{ URL::route('admin.dealers.edit', $dealer->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
                                                {{ Form::open(array('route' => array('admin.dealers.destroy', $dealer->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                                                        <button type="submit" href="{{ URL::route('admin.dealers.destroy', $dealer->id) }}" class="btn btn-danger btn-mini">Delete</butfon>
                                                {{ Form::close() }}
                                        </td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
 
@stop