@extends('layouts.master')
@section('title','Admin | View Driver Profile')
@section('content')
<style>
  
</style>
<!-- page content -->
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
      <div class="">
            <!-- <h3>Driver Profile</h3> -->
            <nav aria-label="breadcrumb bg-transparent">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">Driver Profile</li>
                  <li class="breadcrumb-item">View Driver Profile</li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $driver->driver_name }}</li>
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
                  <form method="POST" action="{{ route('driver.store') }}"  data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Name</label>
                              <div class="">
                                 <span class="form-control">{{ $driver->driver_name }}</span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label  label-align">Phone</label>
                              <div class="">
                                 <span class="form-control">{{ $driver->driver_phone }}</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br><br>
                     <div class="row">
                        <div class="col-sm upload text-center d-flex align-items-center">
                           @if(empty($driver->driver_aadhar))
                           <img src="https://admin.myitronline.com//bundle/article/images/aadhaar-card.jpg" alt="Please upload Aadhar Image"  width="220" height="140" class="img-fluid"/>
                           @else
                           <a href="{{ url('/uploads/driver/aadhar/'.$driver->driver_aadhar) }}" target="_blank" title="view Aadhar">
                           <img src="{{ url('/uploads/driver/aadhar/'.$driver->driver_aadhar) }}" width="220" height="140" class="img-fluid" /> </a>
                           @endif
                        </div>
                        <div class="col-sm upload text-center d-flex align-items-center">
                           @if(empty($driver->driver_pan))
                           <img id="blah2" src="https://thenitintech.com/wp-content/uploads/PAN-Card-e1641740931340.jpeg" alt="Please upload Pan Card"  width="220" height="140" class="img-fluid"/>
                           @else
                           <a href="{{ url('/uploads/driver/pancard/'.$driver->driver_pan) }}" target="_blank" title="view Pan Card">
                           <img src="{{ url('/uploads/driver/pancard/'.$driver->driver_pan) }}" width="220" height="140" class="img-fluid" /></a>
                           @endif
                        </div>
                        <div class="col-sm upload text-center d-flex align-items-center">
                           @if(empty($driver->driver_license))
                           <img src="https://media.istockphoto.com/vectors/driver-license-with-male-photo-identification-or-id-card-template-vector-id1073597286?k=20&m=1073597286&s=612x612&w=0&h=mZZD51mPK3MD8TLKBtUAcTewBIaHeRCr1HfWu9Dy974=" alt="Please upload Driving License"  width="480" height="140" class="img-fluid"/>
                           @else
                           <a href="{{ url('/uploads/driver/license/'.$driver->driver_license) }}" target="_blank" title="view Driving License">
                           <img src="{{ url('/uploads/driver/license/'.$driver->driver_license) }}" width="480" height="140" class="img-fluid" /> </a>
                           @endif
                        </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-5">
                           <a href="{{ route('driver.list') }}"><button type="button" class="btn btn-info">Go Back</button></a>
                           <a href="{{ route('driver.list') }}"><button type="button" class="btn btn-success">Driver List</button></a>
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