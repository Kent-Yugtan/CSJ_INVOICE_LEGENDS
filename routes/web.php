<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeductionTypeController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\EmailConfigController;
use App\Http\Controllers\Admin\InvoiceConfigController;
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

Auth::routes();

Route::get('/', function () {
    // return view('welcome');
    return view('auth/login');
    // echo auth()->user();
});


Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
Route::post('/auth/save', [MainController::class, 'save_user'])->name('auth.save_user');
Route::middleware(['AuthCheck'])->group(function () {
    Route::post('invoice', [InvoiceController::class, 'store']);
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    Route::get('/settings/invoice', [InvoiceController::class, 'current_createinvoice']);
    Route::get('/admin/profile', [ProfileController::class, 'index']);
    // Route::post('admin/SaveProfile', [ProfileController::class, 'store']);

    Route::get('/admin/current', [ProfileController::class, 'current_show']);
    Route::get('/admin/viewProfile/{id}', [ProfileController::class, 'viewProfile']);
    Route::get('/admin/inactive', [ProfileController::class, 'inactive']);

    // Route::get('/invoice/add', InvoiceController::class);
    // Route::get('invoice/add_invoice', [InvoiceController::class, 'add_invoice']);
    Route::get('/invoice/current', [InvoiceController::class, 'current']);
    Route::get('/invoice/inactive', [InvoiceController::class, 'inactive']);
    Route::get('/invoice/add', [InvoiceController::class, 'add_invoice']);


    // POST DEDUCTION TYPES TABLE
    Route::get('/settings/deductiontype', [DeductionTypeController::class, 'view_deductiontype']);

    // SETTINGS EMAIL CONFIG
    Route::get('/settings/emailconfig', [EmailConfigController::class, 'show_config']);

    // Invoice Config
    Route::get('/settings/invoiceconfig', [InvoiceConfigController::class, 'show_invoiceconfig']);
    Route::get('/settings/editinvoice', [InvoiceConfigController::class, 'show_editinvoice']);
    Route::get('/settings/invoice_configs', [InvoiceConfigController::class, 'index']);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
