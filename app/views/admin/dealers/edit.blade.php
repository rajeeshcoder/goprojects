@extends('admin._layouts.default')
 
@section('main')
 
        <h2>Edit dealer</h2>
        
        {{ Notification::showAll() }}
 
        @if ($errors->any())
        <div class="alert alert-error">
                {{ implode('<br>', $errors->all()) }}
        </div>
        @endif
 
        {{ Form::model($dealer, array('method' => 'put', 'route' => array('admin.dealers.update', $dealer->id))) }}
 
                <div class="control-group">
                        {{ Form::label('title', 'Title') }}
                        <div class="controls">
                                {{ Form::text('title') }}
                        </div>
                </div>

                 <div class="control-group">
                        {{ Form::label('manufacturer', 'Manufacturer') }}
                        <div class="controls">
                                {{ Form::select('manufacturer', $manufacturer, $manufacturer_id) }}                
                        </div>
                </div>

                <div class="form-actions">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('admin.dealers.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop