@extends('layouts.master')
@section('title','Admin | Profile Setting')
@section('content')
<style>
   .error {
   margin-top:0px !important;
   color:#dc3545
   }
</style>
<div class="right_col" role="main">
<div class="">
   <div class="page-title">
      <div class="">
         <!-- <h3>Vehicle Profile</h3> -->
         <nav aria-label="breadcrumb bg-transparent">
            <ol class="breadcrumb">
               <li class="breadcrumb-item fs-3"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
               <li class="breadcrumb-item active" aria-current="page">Profile Setting </li>
            </ol>
         </nav>
         <div class="col-sm-12 float-right">
            @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-dismissible p-2">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Error!</strong> {!! session('flash_message_error')!!}.
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-dismissible p-2">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Success!</strong> {!! session('flash_message_success')!!}.
            </div>
            @endif
         </div>
      </div>
   </div>
   <div class="clearfix"></div>
   <div class="row">
      <div class="col-md-12 col-sm-12 ">
         <div class="x_panel">
            <div class="x_title">
               <div class="x_content">
                  <div class="row">
                     <div class="card custom-card">
                        <div class="card-header card-header-primary">
                           <h4 class="card-title">Edit Profile</h4>
                        </div>
                        <div class="card-body w-100 p-30 add-class-form">
                           <form action="{{route('adminaccountupdate.setting')}}" method="POST" name="adminProfile" id="adminProfile" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="current_image" value="{{$adminData->profile}}">
                              <img id="showIMG"  alt="User" width="90" height="90" class="rounded-circle" src="@if(Auth::user()->profile){{asset('/uploads/admin/profile/'. Auth::user()->profile)}}@else{{asset('backend_assets/img/Student.svg')}}@endif">
                              <br>
                              <input id="file-input"  type="file" id="adminPro" name="profile" accept="image/*">
                              <br><br><br>
                              <div class="row">
                                 <div class="form-group  col-6">
                                    <label for="">Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$adminData->name}}" placeholder="Please enter name">
                                    @error('name')
                                    <div class="error mt-0">{{$message}}</div>
                                    @enderror
                                 </div>
                                 <div class="form-group  col-6">
                                    <label for="">Email <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{$adminData->email}}" placeholder="Please enter email">
                                    @error('email')
                                    <div class="error mt-0">{{$message}}</div>
                                    @enderror
                                 </div>
                              </div>
                              <br>
                              <div class="row  mt-20">
                                 <div class="col-12" >
                                    <button type="submit" class="btn btn-success">Update</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card custom-card mb-4">
                           <div class="card-header card-header-primary">
                              <h4 class="card-title">Account Setting</h4>
                           </div>
                           <div class="card-body">
                              <div class="teacher-ac-info">
                                 <br><br>
                                 <form method="POST" action="{{route('admincredential.update')}}" method="POST" id="adminAccontSetting" name="adminAccontSetting">
                                    @csrf
                                    <div class="row">
                                          <div class="form-group col-lg-12">
                                             <label for="">Current Password <span style="color:red">*</span></label>
                                             <input type="password" class="form-control" id="current_password" placeholder="Please enter old password" name="current_password" >
                                             @error('current_password')
                                             <div class="error mt-0">{{$message}}</div>
                                             @enderror
                                          </div>
                                          <div class="form-group col-md-12 col-6">
                                             <label for="">New Password <span style="color:red">*</span></label>
                                             <input type="password" class="form-control" id="new_password" placeholder="Please enter new password" name="new_password">
                                             @error('new_password')
                                             <div class="error mt-0">{{$message}}</div>
                                             @enderror
                                          </div>
                                          <div class="form-group col-md-12 col-6">
                                             <label for="">Confirm Password <span style="color:red">*</span></label>
                                             <input type="password" class="form-control" id="new_confirm_password" placeholder="Please enter new confirm password" name="new_confirm_password">
                                             @error('new_confirm_password')
                                             <div class="error mt-0">{{$message}}</div>
                                             @enderror
                                          </div>
                                       </div>
                                       <br>
                                       <div class="row  mt-20 ml-0 mr-0 mb-4">
                                          <div class="col-12" >
                                             <button type="submit" class="btn btn-success">Update</button>
                                          </div>
                                       </div>
                                 </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
<script>
   function readURL(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader();
       reader.onload = function(e) {
         $('#showIMG').attr('src', e.target.result);
       }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
     }
   }
   $("#file-input").change(function() {
     readURL(this);
   });
</script>
@endsection