@extends('layouts.master')
@section('title','Admin | Edit Vehicle Transport Order')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
  
</style>
<!-- page content -->
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="">
            <!-- <h3>Vehicle Profile</h3> -->
            <nav aria-label="breadcrumb bg-transparent">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">Transport</li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Details</li>
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
                  @php $id= Crypt::encrypt($transport->id); @endphp
                  <form method="POST" action="{{route('update.transport',$id)}}"  data-parsley-validate class="form-horizontal form-label-left">
                     @csrf
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Voucher Date
                                 <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="date" name="vouher_date" value="{{ $transport->exp_start_date }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Voucher Type
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="voucher_type" value="{{ $transport->voucher_type }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Voucher Number
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="number" name="voucher_number" value="{{ $transport->voucher_number }}" class="form-control" required="required" min="0">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Vehicle Details
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <select class="search-autocomplete form-control" name="vehicle" required="required">
                                    <option>Select the Vehicle</option>
                                    @foreach($vehicles as $vehicle)
                                    <option value="{{$vehicle->id}}" {{$vehicle->id == $transport->vehicle_id ? 'selected' : ''}}>{{ $vehicle->vehicle_name }} - {{ $vehicle->vehicle_number }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Driver Name
                              <span class="required" style="color:red">*</span>
                              </label>
                              <select class="search-autocomplete form-control" name="driver">
                                 <option>Select Driver</option>
                                 @foreach($drivers as $driver)
                                 <option value="{{$driver->driver_name}}" {{$driver->driver_name == $transport->dreiver_name ? 'selected' : ''}}>{{ $driver->driver_name }}</option>
                                 @endforeach
                               </select>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Code
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="code" value="{{ $transport->code }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">DL Expire
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="date" name="dl_expire" value="{{ $transport->exp_end_date }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                     </div> 
                     <div class="ln_solid"></div>
                     <h5>Debit Details:-</h5>
                     <div class="feild-container">
                        @foreach($transport->transportDetail as $detail)
                        <div class="data-row row align-items-end">  
                       
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label class="col-form-label label-align">Expense Breakup
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="expense_breakup[]"  value="{{ $detail->expense_brakup }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                       
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label class="col-form-label label-align">Description
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="description[]" value="{{ $detail->description }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label class="col-form-label label-align">Amount
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="amount[]"  value="{{ $detail->amount }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div> 
                        <div class="input-group-btn col-lg-3 text-center">   
                           <button class="btn btn-success bs-add-button" type="button"><i class="fa fa-plus"></i> Add</button>  
                        </div>  
                        </div> 
                        @endforeach
                     </div>
                     <div class="ln_solid"></div>
                     <h5>Bank Details:<input type="checkbox" id="bank_details-show" name="bank_details_check" {{ ($transport['bank_details_check']=="1") ? "checked" : "" }} value="{{ $transport->bank_details_check }}" class="ml-3" /></h5> 
                     <div id="bank-details" style="display:none">
                        <div class="row">
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label class="col-form-label label-align">Bank Name
                                 <span class="required" style="color:red">*</span>
                                 </label>
                                 <div class="">
                                    <input type="text" name="bank_name" value="{{ $transport->bank_name }}" class="form-control">
                                 </div>
                              </div> 
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label class="col-form-label label-align">Account Number
                                 <span class="required" style="color:red">*</span>
                                 </label>
                                 <div class="">
                                    <input type="text" name="account_number" value="{{ $transport->ac_number }}" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label class="col-form-label label-align">IFSC code
                                 <span class="required" style="color:red">*</span>
                                 </label>
                                 <div class="">
                                    <input type="text" name="ifsc_code" value="{{ $transport->ifsc_code }}" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label class="col-form-label label-align">Branch Name
                                 <span class="required" style="color:red">*</span>
                                 </label>
                                 <div class="">
                                    <input type="text" name="branch_name" value="{{ $transport->branch_name }}" class="form-control">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="ln_solid"></div>
                     <h5>Trip Details:-</h5>
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Trip Date
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="date" name="trip_start_date" value="{{ $transport->trip_start_date }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Trip Type
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="trip_type" value="{{ $transport->trip_type }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Client Name
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="client_name" value="{{ $transport->client_name }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Route Name
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="route_name" value="{{ $transport->route_name }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">KM
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="route_distance" value="{{ $transport->route_distance }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Bugt Fuel qty.
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="extimate_budget_fuel_qty" value="{{ $transport->extimate_budget_fuel_qty }}" class="form-control" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="col-form-label label-align">Remark
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <textarea class="form-control" name="remark" rows="5" cols="5">{{ $transport->remark }}</textarea required="required">
                              </div>
                           </div>
                        </div>
                     </div>
                     <br><br>
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
<script>

   $(document).ready(function() {  
      // bank details js
      $('#bank_details-show').click(function() {
         $('#bank-details').toggle();
      });
	}); 
   
   
   jQuery(document).ready(function(){
    var maxLimit = 100;
    var appendHTML = '<div class="data-row row mt-2 align-items-end"><div class="col-lg-3"><div class="form-group"><label class="col-form-label label-align">Expense Breakup<span class="required" style="color:red">*</span></label><div class=""><input type="text" name="expense_breakup[]" class="form-control"></div></div></div><div class="col-lg-3"><div class="form-group"><label class="col-form-label label-align">Description<span class="required" style="color:red">*</span></label><div class=""><input type="text" name="description[]" class="form-control"></div></div></div><div class="col-lg-3"><div class="form-group"><label class="col-form-label label-align">Ammount<span class="required" style="color:red">*</span></label><div class=""><input type="text" name="amount[]" class="form-control"></div></div></div> <div class="input-group-btn col-lg-3 text-center"><button class="btn btn-danger bs-remove-button" type="button"><i class="fa fa-minus"></i> Remove</button></div></div>'; 
    var x = 1;
    
    // for addition
    jQuery('.bs-add-button').click(function(e){
    	e.preventDefault();
        if(x < maxLimit){ 
            jQuery('.feild-container').append(appendHTML);
            x++;
        }
    });
    
    // for deletion
    jQuery('.feild-container').on('click', '.bs-remove-button', function(e){
        e.preventDefault();
        jQuery(this).parents('.data-row').remove();
        x--;
    });
});
</script>
<script src="{{asset('assets/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('.search-autocomplete').select2();
});
</script>
@endsection