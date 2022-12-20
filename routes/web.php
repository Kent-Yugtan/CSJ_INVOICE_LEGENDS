<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\InvoiceController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');8
// });

Auth::routes();


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('profile', ProfileController::class);
    Route::get('current', [ProfileController::class, 'current']);
    Route::get('inactive', [ProfileController::class, 'inactive']);
    Route::get('viewProfile', [ProfileController::class, 'viewProfile']);
    Route::get('editProfile', [ProfileController::class, 'editProfile']);
});

Route::prefix('invoice')->group(function () {
    Route::resource('invoice', InvoiceController::class);
    Route::get('add_invoice', [InvoiceController::class, 'add_invoice']);
    Route::get('current_invoice', [InvoiceController::class, 'current_invoice']);
    Route::get('inactive_invoice', [InvoiceController::class, 'inactive_invoice']);
});