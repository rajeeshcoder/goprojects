@extends('customer._layouts.default')
 
@section('main')

<div class="container">
 
  @if ($vehicles->count() < 3) 
  <div class="row button-row">
    <div class="span12"> 
      <p> 
        <a href="{{ URL::route('customer.vehicles.create') }}" class="btn btn-primary pull-left">Create a New Vehicle</a>
      </p>
    </div>
    </div>        
  @endif
 <div class="row button-space">
    <div class="span12"> 
      <p> </p>
     </div>
  </div>    
<?php $i=0;$j=0; ?>

@if ($vehicles->count() > 0)
<div class="row vehicle-row">
    <div class="span12"> 
      <div class="tabbable tabs-centre">
        <ul class="nav nav-tabs">
         @foreach ($vehicles as $vehicle)      
          <li class={{ $i == 0 ? "active" : ""}}><a href="#{{ $vehicle->id }}" data-toggle="tab">{{ $vehicle->reg_no }}</a></li>
          <?php $i++; ?>     
          @endforeach
        </ul>
        <div id='content' class="tab-content">
                @foreach ($vehicles as $vehicle)   
                      <div class="tab-pane {{ $j == 0 ? "active" : ""}}" id="{{ $vehicle->id }}">

                             <table  class="table table-condensed table-striped table-hover">
                                <tr>
                                <td colspan="2">
                                   <a href="{{ URL::route('customer.vehicles.edit', $vehicle->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
                                                {{ Form::open(array('route' => array('customer.vehicles.destroy', $vehicle->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                                                        <button type="submit" href="{{ URL::route('customer.vehicles.destroy', $vehicle->id) }}" class="btn btn-danger btn-mini">Delete</butfon>
                                                {{ Form::close() }}
                                 </td>                       
                                </tr>
                              <tr>
                                 <td>Manufacturer</td><td>{{ $vehicle->model->manufacturer->title }}</td>
                              </tr>
                              <tr>   
                              <tr>
                                 <td>Model</td><td>{{ $vehicle->model->title }}</td>
                              </tr>
                              <tr>   
                                 <td>Engine No</td><td>{{ $vehicle->engine_no }}</td>
                              </tr>
                              <tr>   
                                 <td>Chasis No</td><td>{{ $vehicle->chasis_no }}</td>
                              </tr>
                              <tr>   
                                 <td>Color</td><td>{{ $vehicle->color }}</td>
                              </tr> 
                              <tr>  
                                 <td>Registration Date</td><td>{{ $vehicle->regdate }}</td>
                             </tr>
                             </table>    
                            <a href="{{ URL::to('/customer/bookings/center', array($vehicle->id, $vehicle->model_id)) }}" class="btn btn-default btn-large pull-left">New Service Booking</a>  
                      </div>
                   <?php $j++; ?> 

                  @endforeach
        </div>
  </div>  
  </div> <!-- End of span -->    
</div> <!--End of Vehicle Row -->
@endif 

</div>        
@stop