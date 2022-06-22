<?php

namespace App\Http\Controllers;

use Auth;
use Crypt;
use Session;
use File;
use App\Models\Driver;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DriversImport;
use App\Exports\DriversExport;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function driverProfileStore(Request $request){
        if ($request->isMethod('post')){
            $request->validate([
                'name'  => 'required',
                'phone' => 'required|min:10|numeric',
            ]);
             #Handle Aadhar upload
             if($request->hasfile('aadhar_card'))
                {
                    $name = uniqid() . '_' . time(). '.' . $request->aadhar_card->getClientOriginalExtension();
                    $path = public_path() .'/uploads/driver/aadhar';
                    $request->aadhar_card->move($path, $name);
                    $aadhar_img = $name;
                }else{
                $aadhar_img = null;
            }
            #Handle Pan card upload
            if($request->hasfile('pan_card'))
            {
                $name = uniqid() . '_' . time(). '.' . $request->pan_card->getClientOriginalExtension();
                $path = public_path() .'/uploads/driver/pancard';
                $request->pan_card->move($path, $name);
                $pan_card_img = $name;
            }else{
            $pan_card_img = null;
            }
            #Handle Pan card upload
            if($request->hasfile('driving_license'))
            {
                $name = uniqid() . '_' . time(). '.' . $request->driving_license->getClientOriginalExtension();
                $path = public_path() .'/uploads/driver/license';
                $request->driving_license->move($path, $name);
                $license_img = $name;
            }else{
            $license_img = null;
            }
            $driver = new Driver();
            $driver->driver_name    = $request->name;
            $driver->driver_phone   = $request->phone;
            $driver->driver_aadhar  = $aadhar_img;
            $driver->driver_pan     = $pan_card_img;
            $driver->driver_license = $license_img;
            $driver->save();
            return redirect()->route('driver.list')->with('flash_message_success','Driver Profile added Successfully !');
        }
        else{
            return view('driver.create');
        }
    }

        public function driverProfileList(){
            $driverDetails = Driver::select('id','driver_name','driver_phone','created_at')
            ->orderBy('driver_name')->get();
            return view('driver.list',compact('driverDetails'));
        }

        public function driverProfileView($id){
            $driverID = Crypt::decrypt($id);
            $driver = Driver::findOrFail($driverID);
            return view('driver.view',compact('driver'));

        }

        #Manage Driver Excel Data (import/export)
        public function driverFileImport(Request $request){
            $request->validate([
                'file'  => 'required|file|max:10000|mimes:xlsx, csv, xls'
            ]);
            #File store in storage\app\temp Directory
            Excel::import(new DriversImport,request()->file('file')->store('temp'));  
            return back();
        }

        public function driverProfileUpdate(Request $request,$id){
            if ($request->isMethod('post')){
                $driverID = Crypt::decrypt($id);
                $driver_Docs = Driver::findOrFail($driverID);
                $request->validate([
                    'name'  => 'required',
                    'phone' => 'required|min:10|numeric',
                ]);
                #Handle A adhar upload
                if($request->hasfile('aadhar_card'))
                {
                #Get Image Path from Folder and Delete if Exist
                $destination = 'uploads/driver/aadhar/'.$driver_Docs->driver_aadhar;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $name = uniqid() . '_' . time(). '.' . $request->aadhar_card->getClientOriginalExtension();
                $path = public_path() .'/uploads/driver/aadhar';
                $request->aadhar_card->move($path, $name);
                $aadhar_img = $name;
                }else{
                $aadhar_img = $request->old_driver_aadhar ?? NULL;
                }
                #Handle Pan card upload
                if($request->hasfile('pan_card'))
                {
                #Get Image Path from Folder and Delete if Exist
                $destination = 'uploads/driver/pancard/'.$driver_Docs->driver_pan;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $name = uniqid() . '_' . time(). '.' . $request->pan_card->getClientOriginalExtension();
                $path = public_path() .'/uploads/driver/pancard';
                $request->pan_card->move($path, $name);
                $pan_card_img = $name;
                }else{
                $pan_card_img = $request->old_driver_pan ?? NULL;
                }
                #Handle Pan card upload and Delete if Exist
                if($request->hasfile('driving_license'))
                {
                #Get Image Path from Folder
                $destination = 'uploads/driver/license/'.$driver_Docs->driver_license;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('driving_license');
                $extension = $file->getClientOriginalExtension();
                $license_filename = time().'.'.$extension;
                $file->move('uploads/driver/license',$license_filename);
                $license_img = $license_filename;
                }else{
                $license_img = $request->old_driver_license ?? NULL;
                }
                $driver = Driver::findOrFail($driverID);
                $driver->driver_name    = $request->name;
                $driver->driver_phone   = $request->phone;
                $driver->driver_aadhar  = $aadhar_img;
                $driver->driver_pan     = $pan_card_img;
                $driver->driver_license = $license_img;
                $driver->save();
                return redirect()->route('driver.list')->with('flash_message_success','Driver Profile updated Successfully !');
            }
            else{
            $driverID = Crypt::decrypt($id);
            $driver = Driver::findOrFail($driverID);
            return view('driver.edit', ('driver'));
            }
        }

        public function driverFileExport() 
        {
            return Excel::download(new DriversExport, 'drivers-collection.xlsx');
        }  
}
