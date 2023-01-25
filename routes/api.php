<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DeductionTypeController;
use App\Http\Controllers\Admin\InvoiceController;
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

    // FOR PROFILE TABLE
    Route::resource('admin/profile', ProfileController::class);
    Route::post('saveprofile', [ProfileController::class, 'store']);

    // SHOW DEDUCTION TYPE IN PROFILE
    Route::get('show_deduction_type', [ProfileController::class, 'show_deduction_types']);

    // Route::post('admin/UpdateProfile', [ProfileController::class, 'store'])->name('profile.update');
    Route::get('admin/current_show_data', [ProfileController::class, 'current_show_data']);
    Route::get('admin/editProfile/{id}', [ProfileController::class, 'store']);
    Route::get('admin/show_edit/{id}', [ProfileController::class, 'show_edit']);

    // POST DEDUCTION TYPES TABLE
    Route::post('savedeductiontype', [DeductionTypeController::class, 'store']);
    Route::get('settings/show_data', [DeductionTypeController::class, 'show_data']);
    Route::get('settings/show_edit/{id}', [DeductionTypeController::class, 'show_edit']);

    //  GET INVOICES FUNCTION
    Route::resource('admin/invoice', InvoiceController::class);
    Route::get('admin/current_invoice', [InvoiceController::class, 'current_invoice']);
    Route::get('admin/inactive_invoice', [InvoiceController::class, 'inactive_invoice']);
    Route::get('invoice/createinvoice', [InvoiceController::class, 'check_profile']);

    // FOR POST INVOICE TABLE
    Route::post('createinvoice', [InvoiceController::class, 'create_invoice']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });