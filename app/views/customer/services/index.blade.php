@extends('customer._layouts.default')
 
@section('main')

<table class="table">
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
@foreach($services as $service)

        <tr>
        <td colspan="8">    
            @foreach ($service->servicemasterstatus as $status)
                <?php if($status->title == "pending") { continue; }; ?> 
                <p>
                <i class="icon-large icon-adjust"></i>
                <button type="button" class="btn btn-info btn-xs disabled="disabled"">
                 {{$status->pivot->created_at}}   {{ ucfirst($status->title)}} 
                 </button>  
                 {{$status->pivot->description}}
                </p>
            @endforeach
        </td>    
        </tr>    
        <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->booking->servicecenter->dealer->title }}</td>
            <td>{{ $service->booking->servicecenter->title }}</td>
            <td>{{ $service->booking->customervehicle->model->title }}</td>
            <td>{{ $service->booking->customervehicle->reg_no }}</td>
            <td>{{ $service->start_date }}</td>
        </tr>
@endforeach
</tbody>
</table>
@stop