@extends('layouts.master')
@section('title','Admin | Transport Invoice List')
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
         <div class="">
            <!-- <h3>Vehicle Profile</h3> -->
            <nav aria-label="breadcrumb bg-transparent">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item fs-3">Transport</li>
                  <li class="breadcrumb-item active" aria-current="page">List of Transport Invoices </li>
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
                 
                     <div class="mt-2 text-right w-100 download-btn">
               
                         <a class="btn btn-success btn-sm" href="{{ route('transport-export') }}" data-toggle="tooltip" data-placement="bottom" title="Export all the Transport Invoices Data in to the Excel Sheet">Export Invoices</a>
                      </div>
              <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card-box table-responsive">
                           <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                              <thead>
                                 <tr>
                                    <th><input type="checkbox" id="check-all" ></th>
                                    <th>Sn</th>
                                    <th>Voucher number</th>
                                    <th>Vch Date</th>
                                    <th>Vehicle</th>
                                    <th>Driver</th>
                                    <th>Client</th>
                                    <th>Route</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              @foreach($transports as $key => $transport)
                                 <tr>
                                    <th><input type="checkbox" id="check-all" ></th>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $transport->voucher_number }}</td>
                                    <td>{{ date('j \\ F Y', strtotime($transport->exp_start_date)) }}</td>
                                    <td>{{ $transport['vehicle']['vehicle_name'] }} - {{ $transport['vehicle']['vehicle_number'] }} - {{ $transport['vehicle']['vehicle_model'] }}</td>
                                    <td>{{ $transport->dreiver_name }}</td>
                                    <td>{{ $transport->client_name }}</td>
                                    <td>{{ $transport->route_name }}</td>
                                   <td>
                                       @php $transportID= Crypt::encrypt($transport->id); @endphp
                                       <a href="{{ route('view.transport',$transportID) }}"><button type="button" class="btn btn-success btn-xs dt-edit" style="margin-right:5px;"
                                          data-toggle="tooltip" data-placement="bottom" title="View Transport Invoice Details">
                                        <span class="fa fa-file" aria-hidden="true"></span>
                                        </button></a>
            
                                       <a href="{{ route('edit.transport',$transportID) }}"><button type="button" class="btn btn-warning btn-xs dt-edit" style="margin-right:5px;"
                                          data-toggle="tooltip" data-placement="bottom" title="Edit Tranport Invoice Details">
                                       <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                       </button></a>
                                       <a href="{{ route('export.transport',$transportID) }}"><button type="button" class="btn btn-warning btn-xs dt-edit" style="margin-right:5px;"
                                          data-toggle="tooltip" data-placement="bottom" title="Export Pdf Tranport Invoice Details">
                                       <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                       </button></a>
                                       {{-- <button type="button" class="btn btn-danger btn-xs dt-delete" data-toggle="tooltip" data-placement="bottom" title="Delete Vehicle Profile">
                                       <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                       </button>  --}}
                                    </td>
                                 </tr>
                            @endforeach
                            </tbody>
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