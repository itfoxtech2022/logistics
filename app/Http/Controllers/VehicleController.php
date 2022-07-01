<?php

namespace App\Http\Controllers;

use Auth;
use Crypt;
use Session;
use File;
use App\Models\Vehicle;
use App\Models\VehicleInstalment;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VehicleExport;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    #Manage Vehicle Profile
    public function vehicleProfileStore(Request $request){
        if ($request->isMethod('post')){
            $request->validate([
                'vehicle_name'   => 'required',
                'vehicle_number' => 'required',
                'vehicle_model'  => 'required',
                'vehicle_type'   => 'required'
            ]);
             #Handle Vehicle Rc upload
             if($request->hasfile('vehicle_rc'))
                {
                    $name = uniqid() . '_' . time(). '.' . $request->vehicle_rc->getClientOriginalExtension();
                    $path = public_path() .'/uploads/vehicle/vehicle_rc';
                    $request->vehicle_rc->move($path, $name);
                    $vehicle_rc = $name;
                }else{
                $vehicle_rc = null;
            }
            #Handle Vehicle Insurance upload
            if($request->hasfile('vehicle_insurance'))
            {
                $name = uniqid() . '_' . time(). '.' . $request->vehicle_insurance->getClientOriginalExtension();
                $path = public_path() .'/uploads/vehicle/vehicle_insurance';
                $request->vehicle_insurance->move($path, $name);
                $vehicle_insurance = $name;
            }else{
            $vehicle_insurance = null;
            }
            #Handle Vehicle Pollution upload
            if($request->hasfile('vehicle_pollution'))
            {
                $name = uniqid() . '_' . time(). '.' . $request->vehicle_pollution->getClientOriginalExtension();
                $path = public_path() .'/uploads/vehicle/vehicle_pollution';
                $request->vehicle_pollution->move($path, $name);
                $vehicle_pollution = $name;
            }else{
            $vehicle_pollution = null;
            }
            $vehicle = new Vehicle();
            $vehicle->vehicle_name      = $request->vehicle_name;
            $vehicle->vehicle_number    = $request->vehicle_number;
            $vehicle->vehicle_condition = $request->vehicle_condition;
            $vehicle->vehicle_model     = $request->vehicle_model;
            $vehicle->vehicle_type      = $request->vehicle_type; 
            $vehicle->vehicle_total_instalment_cost = $request->vehicle_total_instalment_cost;
            $vehicle->vehicle_rc        = $vehicle_rc;
            $vehicle->vehicle_insurance = $vehicle_insurance;
            $vehicle->vehicle_pollution = $vehicle_pollution;
            $vehicle->save();
            return redirect()->route('vehicle.list')->with('flash_message_success','Vehicle Profile added Successfully !');
        }
        else{
            return view('vehicle.create');
        }
    }

    public function vehicleProfileList(){
        $vehicles_data = Vehicle::orderBy('vehicle_name')->get();
        return view('vehicle.list',compact('vehicles_data'));
    }

    public function vehicleProfileView($id){
        $vehicleID = Crypt::decrypt($id);
        $vehicle = Vehicle::findOrFail($vehicleID);
        return view('vehicle.view',compact('vehicle'));
    }

    public function vehicleProfileUpdate(Request $request,$id){
        if ($request->isMethod('post')){
            $vehicleID = Crypt::decrypt($id);
            $request->validate([
                'vehicle_name'   => 'required',
                'vehicle_number' => 'required',
                'vehicle_model'  => 'required',
                'vehicle_type'   => 'required'
            ]);
             #Handle Vehicle Rc upload
             if($request->hasfile('vehicle_rc'))
                {
                    $name = uniqid() . '_' . time(). '.' . $request->vehicle_rc->getClientOriginalExtension();
                    $path = public_path() .'/uploads/vehicle/vehicle_rc';
                    $request->vehicle_rc->move($path, $name);
                    $vehicle_rc = $name;
                }else{
                $vehicle_rc = $request->old_vehicle_rc;
            }
            #Handle Vehicle Insurance upload
            if($request->hasfile('vehicle_insurance'))
            {
                $name = uniqid() . '_' . time(). '.' . $request->vehicle_insurance->getClientOriginalExtension();
                $path = public_path() .'/uploads/vehicle/vehicle_insurance';
                $request->vehicle_insurance->move($path, $name);
                $vehicle_insurance = $name;
            }else{
            $vehicle_insurance = $request->old_vehicle_insurance;
            }
            #Handle Vehicle Pollution upload
            if($request->hasfile('vehicle_pollution'))
            {
                $name = uniqid() . '_' . time(). '.' . $request->vehicle_pollution->getClientOriginalExtension();
                $path = public_path() .'/uploads/vehicle/vehicle_pollution';
                $request->vehicle_pollution->move($path, $name);
                $vehicle_pollution = $name;
            }else{
            $vehicle_pollution =  $request->old_vehicle_pollution;
            }
            $vehicle = Vehicle::findOrFail($vehicleID);
            $vehicle->vehicle_name      = $request->vehicle_name;
            $vehicle->vehicle_number    = $request->vehicle_number;
            $vehicle->vehicle_condition = $request->vehicle_condition;
            $vehicle->vehicle_model     = $request->vehicle_model;
            $vehicle->vehicle_type      = $request->vehicle_type; 
            $vehicle->vehicle_total_instalment_cost = $request->vehicle_total_instalment_cost;
            $vehicle->vehicle_rc        = $vehicle_rc;
            $vehicle->vehicle_insurance = $vehicle_insurance;
            $vehicle->vehicle_pollution = $vehicle_pollution;
            $vehicle->update();
            return redirect()->route('vehicle.list')->with('flash_message_success','Vehicle Profile updated Successfully !');
            }
            else{
                $vehicleID = Crypt::decrypt($id);
                $vehicle   = Vehicle::findOrFail($vehicleID);
                return view('vehicle.edit',compact('vehicle'));
            }
        }

    #Manage Vehicle Instalments
    public function manageVehicleInstalment($id){
        $vehicleID = Crypt::decrypt($id);
        $vehicle_Data = Vehicle::where('id',$vehicleID)->select('id','vehicle_name','vehicle_number','vehicle_total_instalment_cost')->first();
        // $vehicle_Instalment_Data = VehicleInstalment::where('vehicle_id',$vehicleID)->with('VehicleData:id,vehicle_name,vehicle_number')->first();
        $vehicle_Instalment_Data = VehicleInstalment::where('vehicle_id',$vehicleID)->get();
        return view('vehicle.instalment',compact('vehicle_Instalment_Data','vehicle_Data'));
    }

    public function vehicleInstalmentStore(Request $request){
        $vehicle_Instalment = new VehicleInstalment;
        $vehicle_Instalment->vehicle_id         = $request->vehicle_Id;
        //$vehicle_Instalment->total_vehicle_cost = $request->total_instalment;
        $vehicle_Instalment->instalment_price   = $request->instalment_Price;
        $vehicle_Instalment->instalment_date    = $request->instalment_Date;
        $vehicle_Instalment->instalment_month   = $request->instalment_Month;
        $vehicle_Instalment->remaining_vehicle_installment = $request->total_instalment - $request->instalment_Price;
        $vehicle_Instalment->instalment_overdue = $request->instalment_Overdue;
        $vehicle_Instalment->save();
        if($vehicle_Instalment){
          $arr = array('msg' => 'Vehicle Instalment has been added Successfully.', 'status' => true);
      }
      return Response()->json($arr);
    }

    public function editVehicleInstalment($id){
       // $instalmentID = Crypt::decrypt($id);
        $vehicle_Instalment_Data = VehicleInstalment::find($id);
        return response()->json([
            'status' =>200,
            'instalment' =>$vehicle_Instalment_Data,
        ]);
    }

    public function vehicleInstalmentUpdate(Request $request){
        $vehicle_Instalment = VehicleInstalment::find($request->inst_id);
        $vehicle_Instalment->vehicle_id         = $request->vehicle_id;
        $vehicle_Instalment->instalment_price   = $request->instalment_price;
        $vehicle_Instalment->instalment_date    = $request->instalment_date;
        $vehicle_Instalment->instalment_month   = $request->instalment_month;
        $vehicle_Instalment->remaining_vehicle_installment = $vehicle_Instalment->remaining_vehicle_installment - $request->instalment_price;
        $vehicle_Instalment->instalment_overdue = $request->instalment_overdue;
        $vehicle_Instalment->save();   
        return redirect()->back()->with('flash_message_success', 'Instalment updated Successfully'); 
    }

    public function vehicleFileExport(){
        return Excel::download(new VehicleExport, 'vehicle-collection.xlsx');
    } 
    
}


