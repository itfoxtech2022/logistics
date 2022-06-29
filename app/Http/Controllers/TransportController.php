<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Session;
use App\Models\Transport;
use App\Models\TransportDetail;

class TransportController extends Controller
{
    public function createTransport(){
        return view('transport.create');
    }

    public function storeTransport(Request $request){
        $tranaportOrder = new Transport();
        $tranaportOrder->voucher_number = '';
        $tranaportOrder->voucher_type = '';
        $tranaportOrder->exp_start_date = '';
        $tranaportOrder->exp_end_date = '';
        $tranaportOrder->vehicle_id = '';
        $tranaportOrder->dreiver_name = '';
        $tranaportOrder->code = '';
        $tranaportOrder->trip_type = '';
        $tranaportOrder->client_name = '';
        $tranaportOrder->route_name = '';
        $tranaportOrder->route_distance = '';
        $tranaportOrder->extimate_budget_fuel_qty = '';
        $tranaportOrder->bank_name = '';
        $tranaportOrder->ac_number = '';
        $tranaportOrder->ifsc_code = '';
        $tranaportOrder->branch_name = '';
        $tranaportOrder->remark = '';
        $tranaportOrder->save();

        $transportID = $tranaportOrder->id;
            foreach($request['expense_brakup'] as $key=>$val)
            {
                $tranaportOrderDetail = new TransportDetail();
                $tranaportOrderDetail->transportation_id  =  $transportID;
                $tranaportOrderDetail->expense_brakup =  $val;
                $tranaportOrderDetail->description   =  $request['description'][$key];
                $tranaportOrderDetail->amount = $request['amount'][$key];
                $tranaportOrderDetail->save();
            }

    }
}
