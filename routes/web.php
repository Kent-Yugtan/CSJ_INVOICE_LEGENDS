<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\InvoiceController;
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
    return view('/auth/login');
});




    // user save route    
    Route::post('/auth/save',[MainController::class, 'save_user'])->name('auth.save_user');
    Route::post('/auth/check_login',[MainController::class,'check_login'])->name('auth.check_login');
    Route::get('/auth/logout',[MainController::class,'logout'])->name('auth.logout');




  


    Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login',[MainController::class, 'login'])->name('auth.login');
    Route::get('/auth/register',[MainController::class,'register'])->name('auth.register');



    Route::resource('admin/dashboard', DashboardController::class);
    Route::resource('admin/profile', ProfileController::class);
    Route::get('admin/current',[ProfileController::class, 'current']);
    Route::get('admin/inactive',[ProfileController::class, 'inactive']);
    Route::get('admin/viewProfile',[ProfileController::class, 'viewProfile']);
    Route::get('admin/editProfile',[ProfileController::class, 'editProfile']);
    Route::get('admin/viewProfile',[ProfileController::class, 'viewProfile']);
    Route::get('admin/editProfile',[ProfileController::class, 'editProfile']);

    Route::get('admin/current', [ProfileController::class, 'current']);
    Route::get('admin/inactive', [ProfileController::class, 'inactive']);
    Route::get('admin/viewProfile', [ProfileController::class, 'viewProfile']);
    Route::get('admin/editProfile', [ProfileController::class, 'editProfile']);

    Route::resource('admin/invoice', InvoiceController::class);
    Route::get('admin/add_invoice', [InvoiceController::class, 'add_invoice']);
    Route::get('admin/current_invoice', [InvoiceController::class, 'current_invoice']);
    Route::get('admin/inactive_invoice', [InvoiceController::class, 'inactive_invoice']);
});

// 
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); Auth::routes();