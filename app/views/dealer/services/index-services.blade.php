@extends('dealer._layouts.default')
 
@section('main')
 
<table class="table table-striped" id="service">
<thead>
        <tr>
                <th>#</th>
                <th>Name</td>
                <th>Phone No</td>
                <th>Pick up location</th> 
                <th>Current Status</th>
                <th>Reg No</th>
                <th>Service Date</th>
                <th>Model</th>
                <th>Run-In KM</th>
                <th>Service Type</th>
                <th>Service Delivery</th>
        </tr>
</thead>
<tbody>
@foreach ($services as $service)
        <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->booking->customervehicle->user->first_name }}</td>
                <td>{{ $service->booking->customerprofile->primary_phone }}</td>  
                @if(preg_match("/pick/i", $service->booking->service_dispatch, $match))
                <td>{{ $service->booking->customerprofile->address }}</td>  
                @else 
                <td><b>Walk In</b></td>
                @endif  
                <td>{{ $status_msg["$service->id"]->title }}</td>
                <td>{{ $service->booking->customervehicle->reg_no }}</td>
                <td>{{ $service->booking->servicedate }}</td>
                <td>{{ $service->booking->customervehicle->model->title }}</td>
                <td>{{ $service->booking->total_km }}</td>
                <td>{{ $service->booking->service_type }}</td>
                <td>{{ $service->booking->service_dispatch }}</td>
                <td>{{ $service->servicedate }}</td>
                    @if( $buttons[$service->id] && sizeof($buttons[$service->id]) > 0)
                        <td>
                            @foreach($buttons[$service->id] as $button)
                                        <button type="button" id="{{ $service->id }}_{{ $status_msg[$service->id]->pivot->service_master_status_id }}" class="btn btn-info btn-mini">{{ ucfirst($button) }}</button>
                                        <div id="msg_{{ $service->id }}"></div>
                            @endforeach
                        </td>    
                    @endif                
        </tr>
@endforeach
</tbody>
</table>

@stop