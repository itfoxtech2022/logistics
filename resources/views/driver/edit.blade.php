@extends('layouts.master')
@section('title','Admin | Edit Driver Profile')
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
            <h3>Driver Profile</h3>
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
                  <h2><a href="{{ route('driver.list') }}">Driver List </a> / Edit-Update Driver Profile / {{ $driver->driver_name }}</h2>
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
                  @php $driverID= Crypt::encrypt($driver->id); @endphp
                  <form method="POST" action="{{ route('driver.update',$driverID) }}"  data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                     @csrf
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Name
                        <span class="required" style="color:red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                           <input type="text" name="name" value="{{ $driver->driver_name }}" required="required" class="form-control">
                           @error('name')
                           <div class="error mt-0">{{$message}}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Phone</label>
                        <span class="required" style="color:red">*</span>
                        <div class="col-md-6 col-sm-6 ">
                           <input type="text" name="phone" value="{{ $driver->driver_phone }}" required="required" class="form-control">
                           @error('phone')
                           <div class="error mt-0">{{$message}}</div>
                           @enderror
                        </div>
                     </div>
                     <br><br>
                     <div class="row">
                        <div class="col-sm upload">
                           <p>Aadhar</p>
                           &nbsp; &nbsp;
                           <input type="file" accept="image/*" id="imgInp" name="aadhar_card"><br>
                           <input type="hidden" name="old_driver_aadhar" value="{{$driver->driver_aadhar}}">
                           @if(empty($driver->driver_aadhar))
                           <img src="https://admin.myitronline.com//bundle/article/images/aadhaar-card.jpg" alt="Please upload Aadhar Image"  width="180" height="90"/>
                           @else
                           <a href="{{ url('/uploads/driver/aadhar/'.$driver->driver_aadhar) }}" target="_blank" title="view Aadhar">
                           <img id="blah" src="{{ url('/uploads/driver/aadhar/'.$driver->driver_aadhar) }}" width="180" height="90" /> </a>
                           @endif
                        </div>
                        <div class="col-sm upload">
                           <p>Pan Card</p>
                           &nbsp;&nbsp;
                           <input type="file" accept="image/*" id="imgInp2" name="pan_card"><br>
                           <input type="hidden" name="old_driver_pan" value="{{$driver->driver_pan}}">
                           @if(empty($driver->driver_pan))
                           <img src="https://thenitintech.com/wp-content/uploads/PAN-Card-e1641740931340.jpeg" alt="Please upload Pan Card"  width="180" height="90"/>
                           @else
                           <a href="{{ url('/uploads/driver/pancard/'.$driver->driver_pan) }}" target="_blank" title="view Pan Card">
                           <img id="blah2" src="{{ url('/uploads/driver/pancard/'.$driver->driver_pan) }}" width="180" height="90" /></a>
                           @endif
                        </div>
                        <div class="col-sm upload">
                           <p>Driving License</p>
                           &nbsp;&nbsp;
                           <input type="file" accept="image/*" id="imgInp3" name="driving_license"><br>
                           <input type="hidden" name="old_driver_license" value="{{$driver->driver_license}}">
                           @if(empty($driver->driver_license))
                           <img src="https://media.istockphoto.com/vectors/driver-license-with-male-photo-identification-or-id-card-template-vector-id1073597286?k=20&m=1073597286&s=612x612&w=0&h=mZZD51mPK3MD8TLKBtUAcTewBIaHeRCr1HfWu9Dy974=" alt="Please upload Driving License"  width="480" height="140"/>
                           @else
                           <a href="{{ url('/uploads/driver/license/'.$driver->driver_license) }}" target="_blank" title="view Driving License">
                           <img id="blah3" src="{{ url('/uploads/driver/license/'.$driver->driver_license) }}" width="480" height="140" /> </a>
                           @endif
                        </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-5">
                            <a href="{{ route('driver.list') }}"><button type="button" class="btn btn-info">Go Back</button></a>
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