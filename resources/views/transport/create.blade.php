@extends('layouts.master')
@section('title','Admin | Create Vehicle Transport Order')
@section('content')
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
                  <li class="breadcrumb-item active" aria-current="page">Add Details</li>
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
                  <form method="POST" action=""  data-parsley-validate class="form-horizontal form-label-left">
                     @csrf
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Voucher Date
                                 <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="date" name="" value=""  class="form-control">
                                 <!-- @error('vehicle_name')
                                 <div class="error mt-0">{{$message}}</div>
                                 @enderror -->
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Voucher Type
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" value=""  class="form-control">
                                 <!-- @error('vehicle_number')
                                 <div class="error mt-0">{{$message}}</div>
                                 @enderror -->
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Voucher Number
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" value=""  class="form-control">
                                 <!-- @error('vehicle_number')
                                 <div class="error mt-0">{{$message}}</div>
                                 @enderror -->
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Vehicle Details
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <select class="form-control" name="">
                                    <option value="Select the vehicle" selected>Select the Vehicle</option>
                                    <option value="BR01GG2305">BR01GG2305</option>
                                    <option value="BR01GG2306">BR01GG2306</option>
                                    <option value="BR01GG2307">BR01GG2307</option>
                                    <option value="BR01GG2308">BR01GG2308</option>
                                 </select>
                                 <!-- @error('vehicle_condition')
                                 <div class="error mt-0">{{$message}}</div>
                                 @enderror -->
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Driver Name
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Code
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">DL Expire
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="date" name="" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div> 
                     <div class="ln_solid"></div>
                     <h5>Debit Details:-</h5>
                     <div class="feild-container">
                        <div class="data-row row align-items-end">  
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label class="col-form-label label-align">Expense Breakup
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label class="col-form-label label-align">Description
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label class="col-form-label label-align">Ammount
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" class="form-control">
                              </div>
                           </div>
                        </div> 
                        <div class="input-group-btn col-lg-3 text-center">   
                           <button class="btn btn-success bs-add-button" type="button"><i class="fa fa-plus"></i> Add</button>  
                        </div>  
                        </div>  
                     </div>
                     <div class="ln_solid"></div>
                     <h5>Bank Details:<input type="checkbox" id="bank_details-show" name="" value="" class="ml-3" /></h5> 
                     <div id="bank-details" style="display:none">
                        <div class="row">
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label class="col-form-label label-align">Bank Name
                                 <span class="required" style="color:red">*</span>
                                 </label>
                                 <div class="">
                                    <input type="text" name="" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label class="col-form-label label-align">Account Number
                                 <span class="required" style="color:red">*</span>
                                 </label>
                                 <div class="">
                                    <input type="text" name="" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label class="col-form-label label-align">IFSC code
                                 <span class="required" style="color:red">*</span>
                                 </label>
                                 <div class="">
                                    <input type="text" name="" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label class="col-form-label label-align">Branch Name
                                 <span class="required" style="color:red">*</span>
                                 </label>
                                 <div class="">
                                    <input type="text" name="" class="form-control">
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
                                 <input type="text" name="" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Trip Type
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Client Name
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Route Name
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">KM
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="col-form-label label-align">Bugt Fuel qty.
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <input type="text" name="" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="col-form-label label-align">Remark
                              <span class="required" style="color:red">*</span>
                              </label>
                              <div class="">
                                 <textarea class="form-control" rows="5" cols="5"></textarea>
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
    var appendHTML = '<div class="data-row row mt-2 align-items-end"><div class="col-lg-3"><div class="form-group"><label class="col-form-label label-align">Expense Breakup<span class="required" style="color:red">*</span></label><div class=""><input type="text" name="" class="form-control"></div></div></div><div class="col-lg-3"><div class="form-group"><label class="col-form-label label-align">Description<span class="required" style="color:red">*</span></label><div class=""><input type="text" name="" class="form-control"></div></div></div><div class="col-lg-3"><div class="form-group"><label class="col-form-label label-align">Ammount<span class="required" style="color:red">*</span></label><div class=""><input type="text" name="" class="form-control"></div></div></div> <div class="input-group-btn col-lg-3 text-center"><button class="btn btn-danger bs-remove-button" type="button"><i class="fa fa-minus"></i> Remove</button></div></div>'; 
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
@endsection