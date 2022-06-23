@extends('layouts.master')
@section('title','Admin | Create Driver Profile')
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
                     <li class="breadcrumb-item active" aria-current="page">Add Driver Profile</li>
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
                              <label class="col-form-label label-align">Name
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="name" value="{{ old('name') }}" required="required" class="form-control">
                                 @error('name')
                                 <div class="error mt-0">{{$message}}</div>
                                 @enderror
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Phone
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class=" ">
                                 <input type="text" name="phone" value="{{ old('phone') }}" required="required" class="form-control">
                                 @error('phone')
                                 <div class="error mt-0">{{$message}}</div>
                                 @enderror
                              </div>
                           </div>
                        </div>
                     </div>
                     <br><br>
                     <div class="row">
                        <div class="col-sm upload">
                            <p>Aadhar</p>&nbsp; &nbsp;
                           <input type="file"  accept="image/*" id="imgInp" name="aadhar_card"><br>
                           <div class="text-center mt-2">
                              <img id="blah" src="https://admin.myitronline.com//bundle/article/images/aadhaar-card.jpg" alt="Please upload Aadhar Image"  width="180" height="90" class="img-fluid"/>
                           </div>
                        </div>
                        <div class="col-sm upload">
                            <p>Pan Card</p>&nbsp;&nbsp;
                           <input type="file" accept="image/*" id="imgInp2" name="pan_card"><br>
                           <div class="text-center mt-2">
                              <img id="blah2" src="https://thenitintech.com/wp-content/uploads/PAN-Card-e1641740931340.jpeg" alt="Please upload Pan Card"  width="180" height="90" class="img-fluid"/>
                           </div>
                        </div>
                        <div class="col-sm upload">
                            <p>Driving License</p>&nbsp;&nbsp;
                           <input type="file" accept="image/*" id="imgInp3" name="driving_license"><br>
                           <div class="text-center mt-2">
                              <img id="blah3" src="https://media.istockphoto.com/vectors/driver-license-with-male-photo-identification-or-id-card-template-vector-id1073597286?k=20&m=1073597286&s=612x612&w=0&h=mZZD51mPK3MD8TLKBtUAcTewBIaHeRCr1HfWu9Dy974=" alt="Please upload Driving License"  width="180" height="90" class="img-fluid"/>
                       
                           </div>
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