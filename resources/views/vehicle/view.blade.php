@extends('layouts.master')
@section('title','Admin | View Vehicle Profile')
@section('content')
<style>
  
</style>
<!-- page content -->
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="">
            <!-- <h3>Vehicle Profile</h3> -->
            <nav aria-label="breadcrumb bg-transparent">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">Vehicle List</li>
                  <li class="breadcrumb-item">View Driver Profile</li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $vehicle->vehicle_name }}</li>
               </ol>
            </nav>
         </div>
         
      </div>
      <div class="clearfix"></div>
      <div class="row mt-5">
         <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
               <div class="x_content">
                  <br />
                  <form method="POST" data-parsley-validate class="form-horizontal form-label-left">
                     @csrf
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Vehicle Name</label>
                              <div class="">
                                 <span class="form-control">{{ $vehicle->vehicle_name }}</span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Vehicle Number</label>
                              <div class=" ">
                                 <span class="form-control">{{ $vehicle->vehicle_number }}</span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Vehicle Model</label>
                              <div class=" ">
                                 <span class="form-control">{{ $vehicle->vehicle_model }}</span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Vehicle Type</label>
                              <div class=" ">
                                 <span class="form-control">{{ $vehicle->vehicle_type }}</span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Vehicle Condition</label>
                              <div class=" ">
                                 <span class="form-control">{{ $vehicle->vehicle_condition }}</span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Vehicle Instalment Cost</label>
                              <div class=" ">
                                 <span class="form-control">{{ $vehicle->vehicle_total_instalment_cost ?? 'Not Available' }}</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br><br>
                     <div class="row">
                        <div class="col-sm upload text-center">
                           @if(empty($vehicle->vehicle_rc))
                           <img src="http://www.factstoday.in/wp-content/uploads/2018/03/License1.jpg" alt=""  width="220" height="140" class="img-fluid"/>
                           @else
                           <a href="{{ url('/uploads/vehicle/vehicle_rc/'.$vehicle->vehicle_rc) }}" target="_blank" title="Vehicle Rc">
                           <img src="{{ url('/uploads/vehicle/vehicle_rc/'.$vehicle->vehicle_rc) }}" width="220" height="140" class="img-fluid" /> </a>
                           @endif
                        </div>
                        <div class="col-sm upload text-center">
                           @if(empty($vehicle->vehicle_insurance))
                           <img id="blah2" src="https://la-insurance.net/application/files/9715/0111/0458/insurance.jpg" alt="Please upload Pan Card"  width="220" height="140" class="img-fluid"/>
                           @else
                           <a href="{{ url('/uploads/vehicle/vehicle_insurance/'.$vehicle->vehicle_insurance) }}" target="_blank" title="Vehicle Insurance">
                           <img src="{{ url('/uploads/vehicle/vehicle_insurance/'.$vehicle->vehicle_insurance) }}" width="220" height="140" class="img-fluid" /></a>
                           @endif
                        </div>
                        <div class="col-sm upload text-center">
                           @if(empty($vehicle->vehicle_pollution))
                           <img src="https://thumbs.dreamstime.com/b/automobile-truck-emission-gas-pollution-abstract-flat-color-icon-template-148836914.jpg" alt="Please upload Driving License"  width="220" height="140" class="img-fluid"/>
                           @else
                           <a href="{{ url('/uploads/vehicle/vehicle_pollution/'.$vehicle->vehicle_pollution) }}" target="_blank" title="Vehicle Pollution Certificate">
                           <img src="{{ url('/uploads/vehicle/vehicle_pollution/'.$vehicle->vehicle_pollution) }}" width="220" height="140" class="img-fluid"/> </a>
                           @endif
                        </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-5">
                           <a href="{{ route('vehicle.list') }}"><button type="button" class="btn btn-info">Go Back</button></a>
                           <a href="{{ route('vehicle.list') }}"><button type="button" class="btn btn-success">Vehicle List</button></a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /page content -->
@endsection
@section('js')
<script src="{{asset('assets/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
@endsection