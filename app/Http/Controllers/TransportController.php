<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Session;
use Crypt;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Transport;
use App\Models\TransportDetail;
use App\Exports\TransportInvoiceExport;

class TransportController extends Controller
{
    public function createTransport(){
        $drivers = Driver::select('id','driver_name')->orderBy('driver_name')->get();
        $vehicles = Vehicle::select('id','vehicle_name','vehicle_number','vehicle_model')->orderBy('vehicle_number')->get();
        return view('transport.create',compact('drivers','vehicles'));
    }

    public function listTransport(){
        $transports = Transport::select('id','voucher_number','exp_start_date','exp_end_date','vehicle_id','dreiver_name','client_name','route_name','created_at')->orderBy('id','DESC')->get();
        return view('transport.list',compact('transports'));
    }

    public function storeTransport(Request $request){
       //dd($request);
        $tranaportOrder = new Transport();
        $tranaportOrder->voucher_number = $request->voucher_number;
        $tranaportOrder->voucher_type   = $request->voucher_type;
        $tranaportOrder->exp_start_date = $request->vouher_date;
        $tranaportOrder->exp_end_date   = $request->dl_expire;
        $tranaportOrder->vehicle_id     = $request->vehicle;
        $tranaportOrder->dreiver_name   = $request->driver;
        $tranaportOrder->code           = $request->code;
        $tranaportOrder->trip_type      = $request->trip_type;
        $tranaportOrder->client_name    = $request->client_name;
        $tranaportOrder->route_name     = $request->route_name;
        $tranaportOrder->route_distance = $request->route_distance;
        $tranaportOrder->trip_start_date=$request->trip_start_date;
        $tranaportOrder->extimate_budget_fuel_qty = $request->extimate_budget_fuel_qty;
        $tranaportOrder->bank_details_check = isset($request['bank_details_check']) ?  : '0';
        $tranaportOrder->bank_name      = isset($request['bank_name']) ?  : NULL;
        $tranaportOrder->ac_number      = isset($request['account_number']) ?  : NULL;
        $tranaportOrder->ifsc_code      = isset($request['ifsc_code']) ?  : NULL;
        $tranaportOrder->branch_name    = isset($request['branch_name']) ?  : NULL;
        $tranaportOrder->remark = $request->remark;
        $tranaportOrder->save();

        $transportID = $tranaportOrder->id;
            foreach($request['expense_breakup'] as $key=>$val)
            {
                $tranaportOrderDetail = new TransportDetail();
                $tranaportOrderDetail->transportation_id  =  $transportID;
                $tranaportOrderDetail->expense_brakup =  $val;
                $tranaportOrderDetail->description   =  $request['description'][$key];
                $tranaportOrderDetail->amount = $request['amount'][$key];
                $tranaportOrderDetail->save();
            }
            return redirect()->route('list.transport')->with('flash_message_success','Transport Invoice created Successfully !');
        }

        public function viewTransport($id){
            $transportId   = Crypt::decrypt($id);
            $viewTransport = Transport::with('transportDetail')->findOrFail($transportId);
            return view('transport.view',compact('viewTransport'));
        }

        public function editTransport($id){
            $transportId   = Crypt::decrypt($id);
            $transport = Transport::with('transportDetail')->findOrFail($transportId);
            $drivers   = Driver::select('id','driver_name')->orderBy('driver_name')->get();
            $vehicles  = Vehicle::select('id','vehicle_name','vehicle_number','vehicle_model')->orderBy('vehicle_number')->get();
            return view('transport.edit',compact('drivers','vehicles','transport'));
        }

        public function updateTransport(Request $request,$id){
            //  dd($request);
            $id = Crypt::decrypt($id);
            $tranaportOrder = Transport::find($id);
            $tranaportOrder->voucher_number = $request->voucher_number;
            $tranaportOrder->voucher_type   = $request->voucher_type;
            $tranaportOrder->exp_start_date = $request->vouher_date;
            $tranaportOrder->exp_end_date   = $request->dl_expire;
            $tranaportOrder->vehicle_id     = $request->vehicle;
            $tranaportOrder->dreiver_name   = $request->driver;
            $tranaportOrder->code           = $request->code;
            $tranaportOrder->trip_type      = $request->trip_type;
            $tranaportOrder->client_name    = $request->client_name;
            $tranaportOrder->route_name     = $request->route_name;
            $tranaportOrder->route_distance = $request->route_distance;
            $tranaportOrder->trip_start_date=$request->trip_start_date;
            $tranaportOrder->extimate_budget_fuel_qty = $request->extimate_budget_fuel_qty;
            $tranaportOrder->bank_details_check = ($request['bank_details_check']) ?  : '0';
            $tranaportOrder->bank_name      = ($request['bank_name']) ?  : NULL;
            $tranaportOrder->ac_number      = ($request['account_number']) ?  : NULL;
            $tranaportOrder->ifsc_code      = ($request['ifsc_code']) ?  : NULL;
            $tranaportOrder->branch_name    = ($request['branch_name']) ?  : NULL;
            $tranaportOrder->remark = $request->remark;
            $tranaportOrder->save();
            #Get Tranport Table ID and Data store in Transport Details Table
            $transportID = $tranaportOrder->id;
            $transportDetailsData = TransportDetail::where('transportation_id',$transportID)->delete();
            foreach($request['expense_breakup'] as $key=>$val)
            {
                $tranaportOrderDetail = new TransportDetail();
                $tranaportOrderDetail->transportation_id  =  $transportID;
                $tranaportOrderDetail->expense_brakup     =  $val;
                $tranaportOrderDetail->description        =  $request['description'][$key];
                $tranaportOrderDetail->amount = $request['amount'][$key];
                $tranaportOrderDetail->save();
            }
            return redirect()->route('list.transport')->with('flash_message_success','Transport Invoice updated Successfully !');
        }

        public function exportPdfTransport($id){
            $id = Crypt::decrypt($id);
            $viewTransport = Transport::with('transportDetail')->findOrFail($id);
            $viewTransport = PDF::loadView('transport.pdf',compact('viewTransport'));
            return $viewTransport->download('transport_invoice.pdf');
        }

        public function invoiceFileExport(){
            return Excel::download(new TransportInvoiceExport, 'transport-invoices-collection.xlsx');
        }
}


