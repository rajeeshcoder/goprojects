@extends('customer._layouts.default')
 
@section('main')

<div class="container">
  @if ($profiles->count() < 3) 
  <div class="row button-row">
    <div class="span12"> 
      <p> 
        <a href="{{ URL::route('customer.profiles.create') }}" class="btn btn-primary pull-left">Create a New Profile</a>
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

@if ($profiles->count() > 0)
<div class="row profile-row">
    <div class="span12"> 
      <div class="tabbable tabs-centre">
        <ul class="nav nav-tabs">
         @foreach ($profiles as $profile)      
          <li class={{ $i == 0 ? "active" : ""}}><a href="#{{ $profile->title }}" data-toggle="tab">{{ $profile->title }}</a></li>
          <?php $i++; ?>     
          @endforeach
        </ul>
        <div id='content' class="tab-content">
                @foreach ($profiles as $profile)   
                      <div class="tab-pane {{ $j == 0 ? "active" : ""}}" id="{{ $profile->title }}">

                             <table  class="table table-condensed table-striped table-hover">
                                <tr>
                                <td colspan="2">
                                   <a href="{{ URL::route('customer.profiles.edit', $profile->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
                                                {{ Form::open(array('route' => array('customer.profiles.destroy', $profile->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                                                        <button type="submit" href="{{ URL::route('customer.profiles.destroy', $profile->id) }}" class="btn btn-danger btn-mini">Delete</butfon>
                                                {{ Form::close() }}
                                 </td>                       
                                </tr>
                              <tr>
                                 <td>Primary Phone</td><td>{{ $profile->primary_phone }}</td>
                              </tr>
                              <tr>   
                                 <td>Secondary Phone</td><td>{{ $profile->secondary_phone }}</td>
                              </tr>
                              <tr>   
                                 <td>Address</td><td>{{ $profile->address }}</td>
                              </tr>
                              <tr>   
                                 <td>City</td><td>{{ $profile->city }}</td>
                              </tr> 
                              <tr>  
                                 <td>State</td><td>{{ $profile->state }}</td>
                             </tr>
                             </table>    
                      </div>
                   <?php $j++; ?>    
                  @endforeach
        </div>
  </div>  
  </div> <!-- End of span -->    
</div> <!--End of Profile Row -->
@endif 

</div>        
@stop