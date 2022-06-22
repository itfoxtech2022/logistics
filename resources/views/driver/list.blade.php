@extends('layouts.master')
@section('title','Admin | Driver List')
@section('content')
<style>
.error {
   margin-top:0px !important;
   color:#dc3545
}</style>
<link href="{{asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
<!-- page content -->
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="title_left">
            <h3>Driver Profile</h3>
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
                  <h2>List Of Drivers</small></h2>
                  <form action="{{ route('driverFile-import') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center justify-content-end">
                    @csrf
                    <div class="form-group mx-5 mb-0" style="max-width: 600px;">
                        <div class="custom-file text-left">
                            <input type="file" name="file" class="custom-file-input form-control" >
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            @error('file')
                            <div class="error mt-0">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <a href="{{ url('/uploads/Import_driver_sample_file.xlsx') }}" download src="{{ url('/uploads/Import_driver_sample_file.xlsx') }}">
                    <button class="btn btn-warning btn-sm" type="button" data-toggle="tooltip" data-placement="bottom" title="Download Excel Sample File to Store Information and Upload.">Download Sample File</button></a>
                    <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Download Sample File and Fill up all the Informations and Browse File To Import">Import data</button>
                    <a class="btn btn-success btn-sm" href="{{ route('driverFile-export') }}" data-toggle="tooltip" data-placement="bottom" title="Export all the Driver Profiles Data in the Excel Sheet">Export data</a>
                </form>
                <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     <li><a class="close-link"><i class="fa fa-close"></i></a>
                     </li>
                  </ul>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card-box table-responsive">
                           <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>
                                    <th><input type="checkbox" id="check-all" ></th>
                                    </th>
                                    <th>Sn</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              @foreach($driverDetails as $key => $driver)
                              <tbody>
                                 <tr>
                                    <td>
                                    <th><input type="checkbox" id="check-all" ></th>
                                    </td>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $driver->driver_name }}</td>
                                    <td>{{ $driver->driver_phone }}</td>
                                    <td>{{ date('j \\ F Y', strtotime($driver->created_at)) }}</td>
                                    <td>
                                       @php $driverID= Crypt::encrypt($driver->id); @endphp
                                       <a href="{{ route('driver.view',$driverID) }}"><button type="button" class="btn btn-info btn-xs dt-edit" style="margin-right:5px;"
                                          data-toggle="tooltip" data-placement="bottom" title="View Driver Profile">
                                       <span class="fa fa-eye" aria-hidden="true"></span>
                                       </button></a>
                                       <a href="{{ route('driver.update',$driverID) }}"><button type="button" class="btn btn-warning btn-xs dt-edit" style="margin-right:5px;"
                                          data-toggle="tooltip" data-placement="bottom" title="Edit Driver Profile">
                                       <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                       </button></a>
                                       <button type="button" class="btn btn-danger btn-xs dt-delete" data-toggle="tooltip" data-placement="bottom" title="Delete Driver Profile">
                                       <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                       </button>
                                    </td>
                                 </tr>
                              </tbody>
                            @endforeach
                           </table>
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
<!-- Datatables -->
<script src="{{asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection