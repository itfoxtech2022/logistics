@extends('layouts.master')
@section('title','Admin | Edit Vehicle Profile')
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
                  <h2><a href="{{ route('vehicle.list') }}">Vehicle List </a> / Edit-Update Vehicle Profile / {{ $vehicle->vehicle_name }} - <span class="badge badge-info" style="font-size:0.9rem;"> {{ $vehicle->vehicle_number  }} </span></h2>
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
                  @php $vehicleID= Crypt::encrypt($vehicle->id); @endphp
                  <form method="POST" action="{{ route('vehicle.update',$vehicleID) }}"  data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                     @csrf
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Vehicle Name
                        <span class="required" style="color:red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                           <input type="text" name="vehicle_name" value="{{ $vehicle->vehicle_name }}" required="required" class="form-control">
                           @error('vehicle_name')
                           <div class="error mt-0">{{$message}}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Vehicle Number
                        <span class="required" style="color:red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                           <input type="text" name="vehicle_number" value="{{ $vehicle->vehicle_number }}" required="required" class="form-control">
                           @error('vehicle_number')
                           <div class="error mt-0">{{$message}}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Vehicle Condition
                        <span class="required" style="color:red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                           <select class="form-control" name="vehicle_condition">
                           <option value="Good" {{$vehicle->vehicle_condition == 'Good' ? 'selected' : ''}}>Good</option>
                           <option value="Expired Soon" {{$vehicle->vehicle_condition == 'Expired Soon' ? 'selected' : ''}}>Expired Soon</option>
                           <option value="Need Service" {{$vehicle->vehicle_condition == 'Need Service' ? 'selected' : ''}}>Need Service</option>
                           <option value="Fair condition" {{$vehicle->vehicle_condition == 'Fair condition' ? 'selected' : ''}}>Fair condition</option>
                           <option value="Average Condition" {{$vehicle->vehicle_condition == 'Average Condition' ? 'selected' : ''}}>Average Condition</option>
                           </select>
                           @error('vehicle_condition')
                           <div class="error mt-0">{{$message}}</div>
                           @enderror
                        </div>
                     </div>
                     <br><br>
                     <div class="row">
                        <div class="col-sm upload">
                           <p>Vehicle Rc</p>
                           &nbsp; &nbsp;
                           <input type="file"  accept="image/*" id="imgInp" name="vehicle_rc"><br>
                           <input type="hidden" name="old_vehicle_rc" value="{{$vehicle->vehicle_rc}}">
                           @if(empty($vehicle->vehicle_rc))
                           <img src="http://www.factstoday.in/wp-content/uploads/2018/03/License1.jpg" alt="Please upload Vehicle Rc Image"  width="180" height="90"/>
                           @else
                           <a href="{{ url('/uploads/vehicle/vehicle_rc/'.$vehicle->vehicle_rc) }}" target="_blank" title="view Vehicle Rc">
                           <img id="blah" src="{{ url('/uploads/vehicle/vehicle_rc/'.$vehicle->vehicle_rc) }}" width="180" height="90" /> </a>
                           @endif
                        </div>
                        <div class="col-sm upload">
                           <p>Vehicle Insurance</p>
                           &nbsp;&nbsp;
                           <input type="file" accept="image/*" id="imgInp2" name="vehicle_insurance"><br>
                           <input type="hidden" name="old_vehicle_insurance" value="{{$vehicle->vehicle_insurance}}">
                           @if(empty($vehicle->vehicle_insurance))
                           <img src="https://la-insurance.net/application/files/9715/0111/0458/insurance.jpg" alt="Please upload Vehicle Insaurance Image"  width="180" height="90"/>
                           @else
                           <a href="{{ url('/uploads/vehicle/vehicle_insurance/'.$vehicle->vehicle_insurance) }}" target="_blank" title="view Vehicle Insaurance">
                           <img id="blah2" src="{{ url('/uploads/vehicle/vehicle_insurance/'.$vehicle->vehicle_insurance) }}" width="180" height="90" /> </a>
                           @endif
                        </div>
                        <div class="col-sm upload">
                           <p>Vehicle Pollution Certificate</p>
                           &nbsp;&nbsp;
                           <input type="file" accept="image/*" id="imgInp3" name="vehicle_pollution"><br>
                           <input type="hidden" name="old_vehicle_pollution" value="{{$vehicle->vehicle_pollution}}">
                           @if(empty($vehicle->vehicle_pollution))
                           <img src="https://thumbs.dreamstime.com/b/automobile-truck-emission-gas-pollution-abstract-flat-color-icon-template-148836914.jpg" alt="Please upload Vehicle Pollution Image"  width="380" height="140"/>
                           @else
                           <a href="{{ url('/uploads/vehicle/vehicle_pollution/'.$vehicle->vehicle_pollution) }}" target="_blank" title="view Vehicle Pollution">
                           <img id="blah3" src="{{ url('/uploads/vehicle/vehicle_pollution/'.$vehicle->vehicle_pollution) }}" width="380" height="140" /> </a>
                           @endif
                        </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-5">
                           <button class="btn btn-danger" type="reset">Reset</button>
                           <button type="submit" class="btn btn-success">Submit</button>
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
<script>
   imgInp.onchange = evt => {
   const [file] = imgInp.files
   if (file) {
     blah.src = URL.createObjectURL(file)
   }
   }
   imgInp2.onchange = evt => {
   const [file] = imgInp2.files
   if (file) {
     blah2.src = URL.createObjectURL(file)
   }
   }
   imgInp3.onchange = evt => {
   const [file] = imgInp3.files
   if (file) {
     blah3.src = URL.createObjectURL(file)
   }
   }
</script>
@endsection