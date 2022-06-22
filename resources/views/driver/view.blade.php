@extends('layouts.master')
@section('title','Admin | View Driver Profile')
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
                  <h2><a href="{{ route('driver.list') }}">Driver List </a> / View Driver Profile / {{ $driver->driver_name }}</h2>
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
                  <form method="POST" action="{{ route('driver.store') }}"  data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                     @csrf
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Name</label>
                        <div class="col-md-6 col-sm-6">
                           <span class="form-control">{{ $driver->driver_name }}</span>
                        </div>
                     </div>
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Phone</label>
                        <div class="col-md-6 col-sm-6 ">
                           <span class="form-control">{{ $driver->driver_phone }}</span>
                        </div>
                     </div>
                     <br><br>
                     <div class="row">
                        <div class="col-sm upload">
                           @if(empty($driver->driver_aadhar))
                           <img src="https://admin.myitronline.com//bundle/article/images/aadhaar-card.jpg" alt="Please upload Aadhar Image"  width="220" height="140"/>
                           @else
                           <a href="{{ url('/uploads/driver/aadhar/'.$driver->driver_aadhar) }}" target="_blank" title="view Aadhar">
                           <img src="{{ url('/uploads/driver/aadhar/'.$driver->driver_aadhar) }}" width="220" height="140" /> </a>
                           @endif
                        </div>
                        <div class="col-sm upload">
                           @if(empty($driver->driver_pan))
                           <img id="blah2" src="https://thenitintech.com/wp-content/uploads/PAN-Card-e1641740931340.jpeg" alt="Please upload Pan Card"  width="220" height="140"/>
                           @else
                           <a href="{{ url('/uploads/driver/pancard/'.$driver->driver_pan) }}" target="_blank" title="view Pan Card">
                           <img src="{{ url('/uploads/driver/pancard/'.$driver->driver_pan) }}" width="220" height="140" /></a>
                           @endif
                        </div>
                        <div class="col-sm upload">
                           @if(empty($driver->driver_license))
                           <img src="https://media.istockphoto.com/vectors/driver-license-with-male-photo-identification-or-id-card-template-vector-id1073597286?k=20&m=1073597286&s=612x612&w=0&h=mZZD51mPK3MD8TLKBtUAcTewBIaHeRCr1HfWu9Dy974=" alt="Please upload Driving License"  width="480" height="140"/>
                           @else
                           <a href="{{ url('/uploads/driver/license/'.$driver->driver_license) }}" target="_blank" title="view Driving License">
                           <img src="{{ url('/uploads/driver/license/'.$driver->driver_license) }}" width="480" height="140" /> </a>
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