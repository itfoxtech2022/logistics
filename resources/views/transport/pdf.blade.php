<style>
   *{
   /* box-sizing: border-box;
   -webkit-print-color-adjust: exact; */
   }
   body{
   font-family: 'Roboto', sans-serif;
   font-size: 14px;
   font-weight: 300;
   }
   .clearfix::after {
   content: "";
   clear: both;
   display: table;
   }
   p, h1, h2, h3, h4, h5, h6{
   padding: 5px 0;
   margin: 0;
   }
   .invoice-container{
   border: 1px solid #E0E0E0;
   margin: 30px;
   }
   table ,tr, td ,th{
   border: 1px solid #E0E0E0;
   border-collapse: collapse;
   }
   tr,td{
   padding: 10px 0;
   }
   th{
   padding: 10px 0;
   }
   .bg{
   background-color: #E0E0E0;
   }
   .heading-main{
   text-align: center;
   text-transform:uppercase;
   margin: 8px;
   }
   .heading-small{
   text-decoration: underline;
   text-align: center;
   text-transform:uppercase;
   margin: 5px;
   }
   .text-type{
   margin-left: 5px;
   }
   .padding-left{
   padding: 0 10px;
   }
   @media print {
   body{
   font-size: 14px;
   }
   }
</style>
<div class="right_col" role="main">
   <div class="">
 
      <div class="clearfix"></div>
      <div class="row mt-5">
         <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
               <div class="x_content">
                  <div class="invoice-container">
                     <h2 class="heading-main">{{ $viewTransport->client_name }}</h2>
                     <hr style="width:100%;">
                     <h5 class="heading-small">Trip Advance Voucher</h5>
                     <table style="width: 100%;">
                        <tbody>
                           <tr style="width: 100%;">
                              <td style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;"> Vch Date: <span class="text-type" style="font-weight: 400;">{{ date('d-m-Y', strtotime($viewTransport->exp_start_date)) }}</span></p>
                              </td>
                              <td style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;"> Vch No: <span class="text-type" style="font-weight: 400;">{{ $viewTransport->voucher_number }}</span></p>
                              </td>
                              <td style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;">Vch type: <span class="text-type" style="font-weight: 400;">{{ $viewTransport->voucher_type }}</span></p>
                              </td>
                           </tr>
                           <tr style="width: 100%;">
                              <td style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;"> Truck No.: <span class="text-type" style="font-weight: 400;">{{ $viewTransport['vehicle']['vehicle_number'] }}</span></p>
                              </td>
                              <td style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;"> Type: <span class="text-type" style="font-weight: 400;">{{ $viewTransport['vehicle']['vehicle_type'] }}</span></p>
                              </td>
                              <td style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;">Model: <span class="text-type" style="font-weight: 400;">{{ $viewTransport['vehicle']['vehicle_model'] }}</span></p>
                              </td>
                           </tr>
                           <tr style="width: 100%;">
                              <td style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;"> Driver: <span class="text-type" style="font-weight: 400;">{{ $viewTransport->dreiver_name }}</span></p>
                              </td>
                              <td style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;"> Code: <span class="text-type" style="font-weight: 400;">{{ $viewTransport->code }}</span></p>
                              </td>
                              <td style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;">DL Expire: <span class="text-type" style="font-weight: 400;">{{ date('d-m-Y', strtotime($viewTransport->exp_end_date)) }}</span></p>
                              </td>
                           </tr>
                           <tr style="width: 100%;" class="bg">
                              <th style="width: 100%" colspan="3">
                                 <h4 class="padding-left" style="font-weight: 600; text-align:center;"> Debit Details</h4>
                              </th>
                           </tr>
                           <tr style="width: 100%;">
                              <th style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;">Expense Breakup</p>
                              </th>
                              <th style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;">Description</p>
                              </th>
                              <th style="width: 33%">
                                 <p class="padding-left" style="font-weight: 600;">Amount</p>
                              </th>
                           </tr>
                           @php $total = 0; @endphp
                           @foreach($viewTransport->transportDetail as $detail)
                           <tr style="width: 100%;">
                              <th style="width: 33%;">
                                 <p class="padding-left" style="font-weight: 600;">{{ $detail->expense_brakup }}</p>
                              </th>
                              <td style="width: 33%; text-align: center;">
                                 <p class="padding-left">{{ $detail->description }}</p>
                              </td>
                              <td style="width: 33%; text-align: end;">
                                 <p class="padding-left">{{ $detail->amount }}</p>
                                 @php $total += $detail->amount; @endphp
                              </td>
                           </tr>
                           @endforeach
                           <tr style="width: 100%;" class="bg">
                              <td style="width: 100%" colspan="3">
                                 <h4 class="padding-left" style="font-weight: 600; text-align:center;"> Credit Details</h4>
                              </td>
                           </tr>
                           <tr style="width: 100%;">
                              <th style="width: 33%; text-align:start;" colspan="2">
                                 <p class="padding-left" style="font-weight: 600;">CASH IN HAND</p>
                              </th>
                              <td style="width: 33%; text-align:end;">
                                 <p class="padding-left">{{ $total }}</p>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     <table style="width: 100%;">
                        <tr style="width: 100%;" class="bg">
                           <td style="width: 100%" colspan="4">
                              <h4 class="padding-left" style="font-weight: 600; text-align:center;"> Bank Details</h4>
                           </td>
                        </tr>
                        <tr style="width: 100%;">
                           <th style="width: 25%;">
                              <p class="padding-left">Bank Name</p>
                           </th>
                           <th style="width: 25%;">
                              <p class="padding-left">Account No.</p>
                           </th>
                           <th style="width: 25%;">
                              <p class="padding-left">IFSC code</p>
                           </th>
                           <th style="width: 25%;">
                              <p class="padding-left">Branch Name</p>
                           </th>
                        </tr>
                        <tr style="width: 100%;">
                           <td style="width: 25%;">
                              <p class="padding-left">{{ $viewTransport->bank_name }}</p>
                           </td>
                           <td style="width: 25%;">
                              <p class="padding-left">{{ $viewTransport->ac_number }}</p>
                           </td>
                           <td style="width: 25%;">
                              <p class="padding-left">{{ $viewTransport->ifsc_code }}</p>
                           </td>
                           <td style="width: 25%;">
                              <p class="padding-left">{{ $viewTransport->branch_name }}</p>
                           </td>
                        </tr>
                     </table>
                     <table style="width: 100%;">
                        <tr style="width: 100%;" class="bg">
                           <td style="width: 100%" colspan="6">
                              <h4 class="padding-left" style="font-weight: 600; text-align:center;"> Trip Details</h4>
                           </td>
                        </tr>
                        <tr style="width: 100%;">
                           <th style="width: 10%;">
                              <p class="padding-left">Trip Date</p>
                           </th>
                           <th style="width: 10%;">
                              <p class="padding-left">Trip Type
                           </th>
                           <th style="width: 20%;">
                              <p class="padding-left">Client Name</p>
                           </th>
                           <th style="width: 25%;">
                              <p class="padding-left">route Name</p>
                           </th>
                           <th style="width: 10%;">
                              <p class="padding-left">KM</p>
                           </th>
                           <th style="width: 15%;">
                              <p class="padding-left">Bugt Fuel Qty</p>
                           </th>
                        </tr>
                        <tr style="width: 100%;">
                           <td>
                              <p class="padding-left">{{ date('j \\ F Y', strtotime($viewTransport->trip_start_date)) }}</p>
                           </td>
                           <td>
                              <p class="padding-left">{{ $viewTransport->trip_type }}</p>
                           </td>
                           <td>
                              <p class="padding-left">{{ $viewTransport->client_name }}</p>
                           </td>
                           <td>
                              <p class="padding-left">{{ $viewTransport->route_name }}</p>
                           </td>
                           <td>
                              <p class="padding-left">{{ $viewTransport->route_distance }}</p>
                           </td>
                           <td>
                              <p class="padding-left">{{ $viewTransport->extimate_budget_fuel_qty }}</p>
                           </td>
                        </tr>
                     </table>
                     <br>
                     <div class="padding-left">
                        <h3>Remarks:-</h3>
                        <br>
                        <p>Vehicle No. {{ $viewTransport['vehicle']['vehicle_number'] }}</p>
                        <p>{{ $viewTransport->remark }}</p>
                     </div>
                     <br>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
