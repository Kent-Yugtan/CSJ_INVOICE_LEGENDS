<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// USE OF LAVAREL SANCTUM

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Route::get('/auth/login',[MainController::class, 'login'])->name('auth.login');
    // Route::get('/auth/register',[MainController::class,'register'])->name('auth.register');

    Route::post('logout', [AuthController::class, 'logout']);


    Route::resource('admin/dashboard', DashboardController::class);
    Route::resource('admin/profile', ProfileController::class);
    Route::post('admin/SaveProfile', [ProfileController::class, 'store'])->name('profile.save');
    Route::get('admin/EditProfile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('admin/UpdateProfile', [ProfileController::class, 'store'])->name('profile.update');
    Route::get('admin/current', [ProfileController::class, 'current'])->name('current.search');

    Route::resource('admin/invoice', InvoiceController::class);
    Route::get('admin/add_invoice', [InvoiceController::class, 'add_invoice']);
    Route::get('admin/current_invoice', [InvoiceController::class, 'current_invoice']);
    Route::get('admin/inactive_invoice', [InvoiceController::class, 'inactive_invoice']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });