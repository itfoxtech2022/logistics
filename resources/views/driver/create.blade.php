@extends('layouts.master')
@section('title','Admin | Create Driver Profile')
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
            <div class="col-md-5 col-sm-5 form-group pull-right top_search">
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
                  <h2>Add Driver Profile</h2>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Name
                        <span class="required" style="color:red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                           <input type="text" name="name" value="{{ old('name') }}" required="required" class="form-control">
                           @error('name')
                           <div class="error mt-0">{{$message}}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Phone
                        <span class="required" style="color:red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                           <input type="text" name="phone" value="{{ old('phone') }}" required="required" class="form-control">
                           @error('phone')
                           <div class="error mt-0">{{$message}}</div>
                           @enderror
                        </div>
                     </div>
                     <br><br>
                     <div class="row">
                        <div class="col-sm upload">
                            <p>Aadhar</p>&nbsp; &nbsp;
                           <input type="file"  accept="image/*" id="imgInp" name="aadhar_card"><br>
                           <img id="blah" src="https://admin.myitronline.com//bundle/article/images/aadhaar-card.jpg" alt="Please upload Aadhar Image"  width="180" height="90"/>
                        </div>
                        <div class="col-sm upload">
                            <p>Pan Card</p>&nbsp;&nbsp;
                           <input type="file" accept="image/*" id="imgInp2" name="pan_card"><br>
                           <img id="blah2" src="https://thenitintech.com/wp-content/uploads/PAN-Card-e1641740931340.jpeg" alt="Please upload Pan Card"  width="180" height="90"/>
                        </div>
                        <div class="col-sm upload">
                            <p>Driving License</p>&nbsp;&nbsp;
                           <input type="file" accept="image/*" id="imgInp3" name="driving_license"><br>
                           <img id="blah3" src="https://media.istockphoto.com/vectors/driver-license-with-male-photo-identification-or-id-card-template-vector-id1073597286?k=20&m=1073597286&s=612x612&w=0&h=mZZD51mPK3MD8TLKBtUAcTewBIaHeRCr1HfWu9Dy974=" alt="Please upload Driving License"  width="480" height="140"/>
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