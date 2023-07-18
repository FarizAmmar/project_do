<?php

use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RequestStatusController;
use App\Http\Controllers\ResiController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Index
Route::get('/', [ResiController::class, 'index'])->name('resi.search')->middleware('guest');

Route::get('/apps/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/apps/login', [LoginController::class, 'authenticate'])->name('login.auth');

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Unit Listing
Route::get('/listing/unit', [UnitController::class, 'index'])->name('listing.unit')->middleware('auth');

// Unit store to database
Route::post('/listing/unit', [UnitController::class, 'store'])->name('listing.unit.store')->middleware('auth');

// Unit update to database
Route::put('/listing/unit/{id}/{unit_guid}', [UnitController::class, 'update'])->name('listing.unit.update')->middleware('auth');

// Unit delete from database
Route::delete('/listing/unit/{id}/{unit_guid}', [UnitController::class, 'destroy'])->name('listing.unit.delete')->middleware('auth');

// Driver Page
Route::get('/listing/driver', [DriverController::class, 'index'])->name('listing.driver')->middleware('auth');

// Driver Store
Route::post('//listing/driver', [DriverController::class, 'store'])->name('listing.driver.store')->middleware('auth');

// Driver Update
Route::put('/listing/driver/{id}/{driver_guid}', [DriverController::class, 'update'])->name('listing.driver.update')->middleware('auth');

// Driver delete from database
Route::delete('/listing/driver/{id}/{driver_guid}', [DriverController::class, 'destroy'])->name('listing.driver.delete')->middleware('auth');

// Delivery Order Page
Route::get('/listing/delivery', [DeliveryController::class, 'index'])->name('listing.delivery')->middleware('auth');

// Delivery Order New Page
Route::get('/entries/delivery', [DeliveryController::class, 'create'])->name('entries.deliveries')->middleware('auth');

// Delivery Order Edit Page
Route::post('/entries/delivery/{id}/{delivery_GUID}', [DeliveryController::class, 'edit'])->name('entries.deliveries.edit')->middleware('auth');

// Delivery Order Store
Route::post('/listing/delivery', [DeliveryController::class, 'store'])->name('listing.delivery.store')->middleware('auth');

// Delivery Order Update
Route::put('/listing/delivery/{id}/{delivery_GUID}/update', [DeliveryController::class, 'update'])->name('entries.deliveries.update')->middleware('auth');

// Delivery delete from database
Route::delete('/listing/delivery/{id}/{delivery_GUID}', [DeliveryController::class, 'destroy'])->name('entries.deliveries.delete')->middleware('auth');

// Delivery status udpate to database
Route::put('/listing/delivery/{id}/{delivery_GUID}', [DeliveryController::class, 'status'])->name('entries.deliveries.status')->middleware('auth');

// Request Status
Route::get('/listing/request_status', [RequestStatusController::class, 'index'])->name('listing.request.status')->middleware('auth');

// Request Status Entries
Route::post('/entries/request_status/{id}/{guid}', [RequestStatusController::class, 'edit'])->name('entries.request.status')->middleware('auth');

// Request Status Entries Update
Route::put('/entries/request_status/{id}/{guid}', [RequestStatusController::class, 'update'])->name('entries.request.status.update')->middleware('auth');

// Resi
Route::post('/', [ResiController::class, 'search'])->name('search.resi')->middleware('guest');

// Get Unit
Route::get('/get-unit/{id}/{unit_GUID}/{unit_code}', [UnitController::class, 'getUnit']);

// Get Driver
Route::get('/get-driver/{id}/{unit_GUID}', [DriverController::class, 'getDriver']);

// Session error remover
Route::get('/clear-errors', function () {
    Session::forget('errors');
    return redirect()->back();
});
