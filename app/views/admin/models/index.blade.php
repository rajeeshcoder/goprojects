@extends('admin._layouts.default')
 
@section('main')
 
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Manufacturer</th>
                                <th>When</th>
                                <th><a href="{{ URL::route('admin.dealers.create') }}" class="btn btn-primary btn-default pull-left">Create</a></th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($models as $model)
                                <tr>
                                        
                                        <td>{{ $model->id }}</td>
                                        <td><a href="{{ URL::route('admin.models.show', $model->id) }}">{{ $model->title }}</a></td>
                                            <td>{{ $model->manufacturer->title }}</td>
                                        <td>{{ $model->created_at }}</td>
                                        <td>
                                                <a href="{{ URL::route('admin.models.edit', $model->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
                                                {{ Form::open(array('route' => array('admin.models.destroy', $model->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                                                        <button type="submit" href="{{ URL::route('admin.models.destroy', $model->id) }}" class="btn btn-danger btn-mini">Delete</butfon>
                                                {{ Form::close() }}
                                        </td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
 
@stop