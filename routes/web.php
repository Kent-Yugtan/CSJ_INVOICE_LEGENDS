<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeductionTypeController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\EmailConfigController;
use App\Http\Controllers\Admin\InvoiceConfigController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
  // return view('welcome');
  return view('auth/login');
  // echo auth()->user();
});
Auth::routes();
// Route::get('/auth/login', [LoginController::class, 'login']);
// Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
Route::post('/auth/save', [MainController::class, 'save_user'])->name('auth.save_user');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth']], function () {
  echo 'Auth: admin ' . Auth::user();

  Route::get('/admin/dashboard', [DashboardController::class, 'index']);
  Route::get('/settings/invoice', [InvoiceController::class, 'current_createinvoice']);
  Route::get('/admin/profile', [ProfileController::class, 'index']);

  Route::get('/admin/current', [ProfileController::class, 'current_show']);
  Route::get('/admin/activeProfile/{id}/{profile_id}', [ProfileController::class, 'activeProfile']);
  Route::get('/admin/inactiveProfile/{id}/{profile_id}', [ProfileController::class, 'inactiveProfile']);
  Route::get('/admin/inactive', [ProfileController::class, 'inactive']);

  Route::get('/invoice/current', [InvoiceController::class, 'current']);
  Route::get('/invoice/inactive', [InvoiceController::class, 'inactive']);
  Route::get('/invoice/addInvoice', [InvoiceController::class, 'add_invoice']);
  Route::get('/admin/editInvoice/{id}', [InvoiceController::class, 'edit_invoice']);

  // POST DEDUCTION TYPES TABLE
  Route::get('/settings/deductiontype', [DeductionTypeController::class, 'view_deductiontype']);
  Route::get('/user/userdeductiontype', [DeductionTypeController::class, 'view_userdeductiontype']);

  // SETTINGS EMAIL CONFIG
  Route::get('/settings/emailconfig', [EmailConfigController::class, 'show_config']);

  // Invoice Config
  Route::get('/settings/invoiceconfig', [InvoiceConfigController::class, 'show_invoiceconfig']);
  Route::get('/settings/editinvoice', [InvoiceConfigController::class, 'show_editinvoice']);
  Route::get('/settings/invoice_configs', [InvoiceConfigController::class, 'index']);

  // FOR ADMIN REPORTS
  Route::get('/reports/invoice', [InvoiceController::class, 'reports_invoice']);
  Route::get('/reports/deduction', [InvoiceController::class, 'reports_deduction']);
});

Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth']], function () {
  // USER ROUTES 
  echo 'Auth: user ' . Auth::user();
  Route::get('/user/dashboard', [DashboardController::class, 'userindex']);
  Route::get('/user/profile', [ProfileController::class, 'userindex']);
  Route::get('/user/activeProfile/{id}/{profile_id}', [ProfileController::class, 'userviewProfile']);
  Route::get('/user/inactive', [ProfileController::class, 'userinactive']);
  Route::get('/user/editInvoice/{id}', [InvoiceController::class, 'edit_userInvoice']);
  Route::get('/user/addInvoice', [InvoiceController::class, 'user_addInvoice']);
  Route::get('/user/currentActiveInvoice', [InvoiceController::class, 'user_currentActiveInvoice']);
  Route::get('/user/currentInactiveInvoice', [InvoiceController::class, 'user_currentInactiveInvoice']);

  // FOR USER REPORTS
  Route::get('/userReports/invoice', [InvoiceController::class, 'userReports_invoice']);
  Route::get('/userReports/deduction', [InvoiceController::class, 'userReports_deduction']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
