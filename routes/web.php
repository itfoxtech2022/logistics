<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');

});

#Password Reset
Route::any('admin/password-reset',[AdminController::class,'adminPasswordReset'])->name('adminpassword.reset');
Route::any('admin/password/reset/update/{token}',[AdminController::class,'adminPassResetUpdate'])->name('admin.resetupdate');
Route::post('/check-admin-login', [AdminController::class, 'adminLogin'])->name('check.login');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');

#Manage Driver Profiles
Route::any('driver-profile-store',[DriverController::class,'driverProfileStore'])->name('driver.store');
Route::get('driver-profile-list',[DriverController::class,'driverProfileList'])->name('driver.list');
Route::get('driver-profile-view/{id}',[DriverController::class,'driverProfileView'])->name('driver.view');
Route::any('driver-profile-update/{id}',[DriverController::class,'driverProfileUpdate'])->name('driver.update');

#Manage Driver Excel Sheet Data
Route::get('driver-file-import-export', [DriverController::class, 'driverfileImportExport']);
Route::post('driver-file-import', [DriverController::class, 'driverFileImport'])->name('driverFile-import');
Route::get('driver-file-export', [DriverController::class, 'driverFileExport'])->name('driverFile-export');

#Manage Vehicle Data
Route::any('vehicle-profile-store',[VehicleController::class,'vehicleProfileStore'])->name('vehicle.store');
Route::get('vehicle-profile-list',[VehicleController::class,'vehicleProfileList'])->name('vehicle.list');
Route::get('vehicle-profile-view/{id}',[VehicleController::class,'vehicleProfileView'])->name('vehicle.view');
Route::any('vehicle-profile-update/{id}',[VehicleController::class,'vehicleProfileUpdate'])->name('vehicle.update');

#Manage Vehicle Instalment
Route::get('vehicle-instalments-manage/{id}',[VehicleController::class,'manageVehicleInstalment'])->name('manage.vehicle.instalment');
Route::post('vehicle-instalments-store',[VehicleController::class,'vehicleInstalmentStore'])->name('store.vehicle.instalment');