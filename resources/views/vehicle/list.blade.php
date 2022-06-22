@extends('layouts.master')
@section('title','Admin | Vehicle List')
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
            <h3>Vehicle Profile</h3>
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
                  <h2>List Of Vehicles</small></h2>

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
                    <a href="{{ url('/uploads/driver/aadhar/Import_driver_sample_file.xlsx') }}" download src="{{ url('/uploads/driver/aadhar/Import_driver_sample_file.xlsx') }}">
                    <button class="btn btn-warning btn-sm" type="button">Download Sample File</button></a>
                    <button class="btn btn-primary btn-sm">Import data</button>
                    <a class="btn btn-success btn-sm" href="{{ route('driverFile-export') }}">Export data</a>
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
                                    <th>Vehicle Name</th>
                                    <th>Vehicle Number</th>
                                    <th>Vehicle Condition</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              @foreach($vehicles_data as $key => $vehicle)
                              <tbody>
                                 <tr>
                                    <td>
                                    <th><input type="checkbox" id="check-all" ></th>
                                    </td>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $vehicle->vehicle_name }}</td>
                                    <td>{{ $vehicle->vehicle_number }}</td>
                                    <td>
                                        @if($vehicle->vehicle_condition == 'Expired Soon')
                                        <span class="badge badge-danger" style="font-size:0.8rem;">{{ $vehicle->vehicle_condition }}</span>
                                        @else
                                        <span class="badge badge-info" style="font-size:0.8rem;">{{ $vehicle->vehicle_condition }}</span>
                                    @endif
                                    </td>
                                    <td>{{  date('j \\ F Y', strtotime($vehicle->created_at)) }}</td>
                                    <td>
                                       @php $vehicle_ID= Crypt::encrypt($vehicle->id); @endphp
                                       <a href="{{ route('manage.vehicle.instalment',$vehicle_ID) }}"><button type="button" class="btn btn-success btn-xs dt-edit" style="margin-right:5px;"
                                          data-toggle="tooltip" data-placement="bottom" title="View Instalment Details">
                                        <span class="fa fa-file" aria-hidden="true"></span>
                                        </button></a>
                                       <a href="{{ route('vehicle.view',$vehicle_ID) }}"><button type="button" class="btn btn-info btn-xs dt-edit" style="margin-right:5px;"
                                          data-toggle="tooltip" data-placement="bottom" title="View Vehicle Profile">
                                       <span class="fa fa-eye" aria-hidden="true"></span>
                                       </button></a>
                                       <a href="{{ route('vehicle.update',$vehicle_ID) }}"><button type="button" class="btn btn-warning btn-xs dt-edit" style="margin-right:5px;"
                                          data-toggle="tooltip" data-placement="bottom" title="Edit Vehicle Details">
                                       <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                       </button></a>
                                       <button type="button" class="btn btn-danger btn-xs dt-delete" data-toggle="tooltip" data-placement="bottom" title="Delete Vehicle Profile">
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