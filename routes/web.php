<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TransportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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

#Profile Setting  
Route::get('/profile-settings', [AdminController::class, 'ProfileSetting'])->name('adminaccount.setting');
Route::post('/profile-settings-update', [AdminController::class, 'ProfileSettingUpdate'])->name('adminaccountupdate.setting');
Route::post('/account-credential-update', [AdminController::class, 'credentialSetting'])->name('admincredential.update');

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
Route::get('vehicle-instalments-edit/{id}',[VehicleController::class,'editVehicleInstalment'])->name('edit.vehicle.instalment');
Route::post('vehicle-instalments-update/',[VehicleController::class,'vehicleInstalmentUpdate'])->name('update.vehicle.instalment');
Route::get('vehicle-file-export', [VehicleController::class, 'vehicleFileExport'])->name('vehicleFile-export');

#Manage Transport
Route::get('create-transport-order',[TransportController::class,'createTransport'])->name('create.transport');
Route::post('store-transport-order',[TransportController::class,'storeTransport'])->name('store.transport');
Route::get('list-transport-order',[TransportController::class,'listTransport'])->name('list.transport');
Route::get('view-transport-order/{id}',[TransportController::class,'viewTransport'])->name('view.transport');
Route::get('edit-transport-order/{id}',[TransportController::class,'editTransport'])->name('edit.transport');
Route::post('update-transport-order/{id}',[TransportController::class,'updateTransport'])->name('update.transport');
Route::get('export-transport-order-pdf/{id}',[TransportController::class,'exportPdfTransport'])->name('export.transport');
Route::get('transprt-invoice-file-export', [TransportController::class, 'invoiceFileExport'])->name('transport-export');
