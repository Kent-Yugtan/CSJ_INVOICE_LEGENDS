<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DeductionTypeController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\EmailConfigController;
use App\Http\Controllers\Admin\InvoiceConfigController;
use App\Http\Controllers\Admin\ProfileDeductionTypesController;

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
    Route::get('show_ProfileDeductionType', [ProfileController::class, 'show_ProfileDeductionType']);

    // Route::post('admin/UpdateProfile', [ProfileController::class, 'store'])->name('profile.update');
    Route::get('admin/current_show_data_active', [ProfileController::class, 'current_show_data_active']);
    Route::get('admin/current_show_data_inactive', [ProfileController::class, 'current_show_data_inactive']);
    Route::get('admin/viewProfile/{id}', [ProfileController::class, 'store']);
    // Route::get('admin/viewProfile/{user_id}/{profile_id}', [ProfileController::class, 'store']);
    Route::get('admin/show_edit/{id}', [ProfileController::class, 'show_edit']);

    // POST DEDUCTION TYPES TABLE
    Route::post('savedeductiontype', [DeductionTypeController::class, 'store']);
    Route::get('settings/show_data', [DeductionTypeController::class, 'show_data']);
    // Route::get('settings/show_deduction_data', [DeductionTypeController::class, 'show_deduction_data']);
    Route::get('settings/show_edit/{id}', [DeductionTypeController::class, 'show_edit']);

    // POST EMAIL TYPE TABLE
    Route::post('saveemailtype', [EmailConfigController::class, 'store']);
    Route::get('settings/show_emaildata', [EmailConfigController::class, 'show_data']);
    Route::get('settings/show_emailedit/{id}', [EmailConfigController::class, 'show_edit']);

    //  GET INVOICES FUNCTIONS
    Route::post('createinvoice', [InvoiceController::class, 'create_invoice']);
    Route::get('admin/current_invoice', [InvoiceController::class, 'current_invoice']);
    Route::get('admin/inactive_invoice', [InvoiceController::class, 'inactive_invoice']);
    Route::get('invoice/check_profile/{id}', [InvoiceController::class, 'check_profile']);
    Route::get('invoice/generate_invoice_number', [InvoiceController::class, 'generate_invoice']);
    Route::get('admin/show_invoice', [InvoiceController::class, 'show_invoice']);
    Route::get('admin/editInvoice/{id}', [InvoiceController::class, 'editInvoice']);
    Route::get('getInvoiceStatus/{id}', [InvoiceController::class, 'getInvoiceStatus']);
    Route::get('admin/show_deductions_dataONdeductions', [InvoiceController::class, 'show_deductions_dataONdeductions']);
    Route::post('update_status', [InvoiceController::class, 'update_status']);

    // FOR EMAIL CONFIG TABLE
    Route::get('get_name', [EmailConfigController::class, 'get_name']);
    Route::get('emailconfigs/show_data', [EmailConfigController::class, 'show_data']);
    Route::get('emailconfigs/show_edit/{id}', [EmailConfigController::class, 'show_edit']);
    Route::post('emailconfigs_store', [EmailConfigController::class, 'emailconfig_store']);

    // POST PROFILE DEDUCTION TYPES TABLE
    Route::post('saveProfileDeductionTypes', [ProfileDeductionTypesController::class, 'store']);
    Route::post('editProfileDeductionTypes', [ProfileDeductionTypesController::class, 'store']);
    Route::post('showProfileDeductionTypes/{id}', [ProfileDeductionTypesController::class, 'show']);
    Route::get('settings/show_profileDeductionType_data/{profile_id}', [ProfileDeductionTypesController::class, 'show_profileDeductionType_data']);
    Route::get('settings/show_deduction_data/{profile_id}', [ProfileDeductionTypesController::class, 'show_deduction_data']);
    Route::get('settings/get_deduction/{id}', [ProfileDeductionTypesController::class, 'get_deduction']);
    Route::post('deleteProfileDeductionTypes/{id}', [ProfileDeductionTypesController::class, 'destroy']);

    // FOR INVOICE CONFIG TABLE
    Route::post('saveInvoiceConfig', [InvoiceConfigController::class, 'store']);
    Route::get('show_invoiceConfig_data', [InvoiceConfigController::class, 'show_invoiceConfig_data']);
    Route::get('invoice_config/show_edit/{id}', [InvoiceConfigController::class, 'show_edit']);
    Route::get('get_invoice_config', [InvoiceController::class, 'get_invoice_config']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });