<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarketingController;
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
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/', [LoginController::class, 'authenticate'])->name('login.auth');

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Unit Listing
Route::get('/listing/unit', [UnitController::class, 'index'])->name('listing.unit')->middleware('auth');

// Unit store to database
Route::post('/listing/unit', [UnitController::class, 'store'])->name('listing.unit.store')->middleware('auth');

//Driver Page
Route::get('/listing/driver', [DriverController::class, 'index'])->name('listing.driver')->middleware('auth');
