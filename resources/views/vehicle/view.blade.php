@extends('layouts.master')
@section('title','Admin | View Vehicle Profile')
@section('content')
<style>
   .upload {
   border: 2px dashed rgba(0, 0, 0, 0.532);
   border-radius: 15px;
   margin: 15px;
   padding: 10px;
   width: 80%;
   display: flex;
   justify-content: center;
   box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.518);
   }
   .error {
   margin-top:0px !important;
   color:#dc3545
   }
</style>
<!-- page content -->
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="title_left">
            <h3>Vehicle Profile</h3>
         </div>
         <div class="title_right">
            <div class="col-md-5 col-sm-5  form-group pull-right top_search">
               <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
                  </span>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
               <div class="x_title">
                  <h2><a href="{{ route('vehicle.list') }}">Vehicle List </a> / View Driver Profile / {{ $vehicle->vehicle_name }}</h2>
                  <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     <li><a class="close-link"><i class="fa fa-close"></i></a>
                     </li>
                  </ul>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  <br />
                  <form method="POST" data-parsley-validate class="form-horizontal form-label-left">
                     @csrf
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Vehicle Name</label>
                        <div class="col-md-6 col-sm-6">
                           <span class="form-control">{{ $vehicle->vehicle_name }}</span>
                        </div>
                     </div>
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Vehicle Number</label>
                        <div class="col-md-6 col-sm-6 ">
                           <span class="form-control">{{ $vehicle->vehicle_number }}</span>
                        </div>
                     </div>
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Vehicle Condition</label>
                        <div class="col-md-6 col-sm-6 ">
                           <span class="form-control">{{ $vehicle->vehicle_condition }}</span>
                        </div>
                     </div>
                     <br><br>
                     <div class="row">
                        <div class="col-sm upload">
                           @if(empty($vehicle->vehicle_rc))
                           <img src="http://www.factstoday.in/wp-content/uploads/2018/03/License1.jpg" alt=""  width="220" height="140"/>
                           @else
                           <a href="{{ url('/uploads/vehicle/vehicle_rc/'.$vehicle->vehicle_rc) }}" target="_blank" title="Vehicle Rc">
                           <img src="{{ url('/uploads/vehicle/vehicle_rc/'.$vehicle->vehicle_rc) }}" width="220" height="140" /> </a>
                           @endif
                        </div>
                        <div class="col-sm upload">
                           @if(empty($vehicle->vehicle_insurance))
                           <img id="blah2" src="https://la-insurance.net/application/files/9715/0111/0458/insurance.jpg" alt="Please upload Pan Card"  width="220" height="140"/>
                           @else
                           <a href="{{ url('/uploads/vehicle/vehicle_insurance/'.$vehicle->vehicle_insurance) }}" target="_blank" title="Vehicle Insurance">
                           <img src="{{ url('/uploads/vehicle/vehicle_insurance/'.$vehicle->vehicle_insurance) }}" width="220" height="140" /></a>
                           @endif
                        </div>
                        <div class="col-sm upload">
                           @if(empty($vehicle->vehicle_pollution))
                           <img src="https://thumbs.dreamstime.com/b/automobile-truck-emission-gas-pollution-abstract-flat-color-icon-template-148836914.jpg" alt="Please upload Driving License"  width="480" height="140"/>
                           @else
                           <a href="{{ url('/uploads/vehicle/vehicle_pollution/'.$vehicle->vehicle_pollution) }}" target="_blank" title="Vehicle Pollution Certificate">
                           <img src="{{ url('/uploads/vehicle/vehicle_pollution/'.$vehicle->vehicle_pollution) }}" width="480" height="140" /> </a>
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