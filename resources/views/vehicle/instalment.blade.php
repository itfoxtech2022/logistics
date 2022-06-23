@extends('layouts.master')
@section('title','Admin | Manage Vehicle Instalment')
@section('content')
<style>
   .error {
   margin-top:0px !important;
   color:#dc3545
   }
</style>
<link href="{{asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
<!-- page content -->
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="">
            <!-- <h3>Vehicle Instalments</h3> -->
            <nav aria-label="breadcrumb bg-transparent">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item fs-3">Vehicle Profile</li>
                  <li class="breadcrumb-item fs-3">Instalment</li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $vehicle_Data['vehicle_name']  }} - <span>{{ $vehicle_Data['vehicle_number'] }}</span> </li>
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
               <div class="x_title text-right">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-warning" title="Click here to Add Instalment" data-toggle="modal" data-target="#instalmentModal">
                  Add Instalment
                  </button>
                  <div class="clearfix"></div>
               </div>
               <!-- Modal -->
               <div class="modal fade" id="instalmentModal" tabindex="-1" role="dialog" aria-labelledby="instalmentModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <form data-parsley-validate class="form-horizontal form-label-left" id="instalmentForm">
                        <div class="alert alert-success d-none" id="msg_div">
                           <span id="res_message"></span>
                          </div>
                         <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="instalmentModalLabel">{{ $vehicle_Data['vehicle_name']  }} - <span>{{ $vehicle_Data['vehicle_number'] }}</span></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body" style="width:620px;">
                              <input type="hidden" name="vehicle_id" id="vehicle_id" value="{{ $vehicle_Data['id']  }}">
                              <div class="item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3 label-align">Instalment Price
                                 <span class="required" style="color:red">*</span>
                                 </label>
                                 <div class="col-md-6 col-sm-6">
                                    <input type="text" name="instalment_price"  id="instalment_price" value="{{ old('instalment_price') }}" required="required" class="form-control">
                                 </div>
                                 @error('instalment_price')
                                 <div class="error mt-0">{{$message}}</div>
                                 @enderror
                              </div>
                              <div class="item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3 label-align">Instalment Month
                                 <span class="required" style="color:red">*</span>
                                 </label>
                                 <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="instalment_month"  id="instalment_month" required="required">
                                    <option>Select Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                    </select>
                                    @error('instalment_month')
                                    <div class="error mt-0">{{$message}}</div>
                                    @enderror
                                 </div>
                              </div>
                              <div class="item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3 label-align">Instalment Date
                                 <span class="required" style="color:red">*</span>
                                 </label>
                                 <div class="col-md-6 col-sm-6">
                                    <input type="date" name="instalment_date"  id="instalment_date" value="{{ old('instalment_date') }}" required="required" class="form-control">
                                 </div>
                                 @error('instalment_date')
                                 <div class="error mt-0">{{$message}}</div>
                                 @enderror
                              </div>
                              <div class="item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3 label-align">Instalment Overdue
                                 </label>
                                 <div class="col-md-6 col-sm-6">
                                    <input type="text" name="instalment_overdue"  id="instalment_overdue" value="{{ old('instalment_overdue') }}" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <div class="col-md-6 col-sm-6 offset-md-5">
                                 <button class="btn btn-danger" type="reset">Reset</button>
                                 <button type="submit" class="btn btn-success">Submit</button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="x_content">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card-box table-responsive">
                           <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap bulk-action" cellspacing="0" width="100%">
                              <thead>
                                 <th><input type="checkbox" id="check-all" ></th>
                                 <th>Sn</th>
                                 <th>Instalment Month</th>
                                 <th>Instalment Paid Date</th>
                                 <th>Remaining vehicle installment</th>
                                 <th>Due Amount</th>
                                 <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              @foreach($vehicle_Instalment_Data as $key => $vehicle_Data)
                                 <tr>
                                    <th><input type="checkbox" id="check-all" ></th>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $vehicle_Data->instalment_month }}</td>
                                    <td>{{ date('d-M-Y', strtotime($vehicle_Data->instalment_date)); }}</td> 
                                    <td>{{ $vehicle_Data->remaining_vehicle_installment }}</td>
                                    <td>{{ $vehicle_Data->instalment_overdue }}</td>
                                    <td>
                                       <a href=""><button type="button" class="btn btn-warning btn-xs dt-edit" style="margin-right:5px;">
                                       <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                       </button></a>
                                       <button type="button" class="btn btn-danger btn-xs dt-delete">
                                       <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                       </button>
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
<script src="{{asset('assets/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
<script>
$('#instalmentForm').on('submit',function(event){
    event.preventDefault();
    // Get Alll Text Box Id's
    vehicle_Id         = $('#vehicle_id').val();
    instalment_Price   = $('#instalment_price').val();
    instalment_Month   = $('#instalment_month').val(); 
    instalment_Date    = $('#instalment_date').val();
    instalment_Overdue = $('#instalment_overdue').val();
    message = $('#message').val();
    $.ajax({
      //Define Post URL
      url: "/vehicle-instalments-store", 
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        vehicle_Id:vehicle_Id,
        instalment_Price:instalment_Price,
        instalment_Month:instalment_Month,
        instalment_Date:instalment_Date,
        instalment_Overdue:instalment_Overdue,
        message:message,
      },
      //Display Response Success Message
      success: function(response){
      $('#res_message').show();
        $('#res_message').html(response.msg);
        $('#msg_div').removeClass('d-none');
 
        document.getElementById("instalmentForm").reset();
        setTimeout(function(){
        $('#res_message').hide();
        $('#msg_div').hide();
        },2000);
   },
  });
});
// .then(function(value) {
//         if (value) {
//          location.reload();
//         }
// });
</script>
@endsection 