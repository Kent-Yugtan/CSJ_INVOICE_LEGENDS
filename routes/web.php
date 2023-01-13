<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeductionTypeController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProfileController;
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
    echo auth()->user();
});


Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
Route::middleware(['AuthCheck'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    Route::get('/settings/invoice', [InvoiceController::class, 'current_createinvoice']);
    Route::get('/admin/profile', [ProfileController::class, 'index']);
    // Route::post('admin/SaveProfile', [ProfileController::class, 'store']);

    Route::get('/admin/current', [ProfileController::class, 'current_show']);
    Route::get('/admin/editProfile/{id}', [ProfileController::class, 'edit']);
    Route::get('/admin/inactive', [ProfileController::class, 'inactive']);

    // Route::get('/invoice/add', InvoiceController::class);
    // Route::get('invoice/add_invoice', [InvoiceController::class, 'add_invoice']);
    Route::get('/invoice/current', [InvoiceController::class, 'current']);
    Route::get('/invoice/inactive', [InvoiceController::class, 'inactive']);
    Route::get('/invoice/add', [InvoiceController::class, 'add_invoice']);

    // POST DEDUCTION TYPES TABLE
    Route::get('/settings/deductiontype', [DeductionTypeController::class, 'view_deductiontype']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
