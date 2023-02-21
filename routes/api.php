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
  // Route::post('send', [InvoiceController::class, 'sendEmail'])->name('send.email');

  Route::post('logout', [AuthController::class, 'logout']);

  Route::resource('admin/dashboard', DashboardController::class);

  Route::post('createinvoice', [InvoiceController::class, 'create_invoice']);
  Route::post('add_invoices', [InvoiceController::class, 'add_invoices']);

  // FOR PROFILE TABLE
  Route::resource('admin/profile', ProfileController::class);
  Route::post('saveprofile', [ProfileController::class, 'store']);
  Route::get('show_profile', [ProfileController::class, 'show_profile']);

  // SHOW DEDUCTION TYPE IN PROFILE
  Route::get('show_deduction_type', [ProfileController::class, 'show_deduction_types']);
  Route::get('show_ProfileDeductionType', [ProfileController::class, 'show_ProfileDeductionType']);

  // Route::post('admin/UpdateProfile', [ProfileController::class, 'store'])->name('profile.update');
  Route::get('admin/show_data_active', [ProfileController::class, 'show_data_active']);
  Route::get('admin/show_data_inactive', [ProfileController::class, 'show_data_inactive']);
  Route::get('admin/activeProfile/{id}', [ProfileController::class, 'store']);
  Route::get('admin/inactiveProfile/{id}', [ProfileController::class, 'store']);
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
  Route::post('update_status_activeOrinactive', [InvoiceController::class, 'update_status_activeOrinactive']);
  Route::post('update_status', [InvoiceController::class, 'update_status']);
  Route::post('delete_invoice/{id}', [InvoiceController::class, 'destroy']);
  Route::get('admin/current_invoice', [InvoiceController::class, 'current_invoice']);
  Route::get('admin/inactive_invoice', [InvoiceController::class, 'inactive_invoice']);
  Route::get('invoice/check_profile/{id}', [InvoiceController::class, 'check_profile']);
  Route::get('invoice/generate_invoice_number', [InvoiceController::class, 'generate_invoice']);
  Route::get('admin/show_invoice', [InvoiceController::class, 'show_invoice']); // SHOW ACTIVE INVOICES
  Route::get('admin/show_statusInactiveinvoice', [InvoiceController::class, 'show_statusInactiveinvoice']); // SHOW INACTIVE INVOICES
  Route::get('admin/search_statusActive_invoice', [InvoiceController::class, 'search_statusActive_invoice']);
  Route::get('admin/search_statusInactive_invoice', [InvoiceController::class, 'search_statusInactive_invoice']);
  Route::get('admin/editInvoice/{id}', [InvoiceController::class, 'editInvoice']); // EDIT INVOICE VIEW
  Route::get('invoiceConfig', [InvoiceController::class, 'invoiceConfig']); // INVOICE CONFIGS DATA
  Route::get('getInvoiceStatus/{id}', [InvoiceController::class, 'getInvoiceStatus']);
  Route::get('admin/show_Profilededuction_Table_Active', [InvoiceController::class, 'show_Profilededuction_Table_Active']);
  Route::get('active_overdue_invoice_count', [InvoiceController::class, 'active_overdue_invoice_count']);
  Route::get('active_paid_invoice_count', [InvoiceController::class, 'active_paid_invoice_count']);
  Route::get('active_pending_invoice_count', [InvoiceController::class, 'active_pending_invoice_count']);
  Route::get('active_cancelled_invoice_count', [InvoiceController::class, 'active_cancelled_invoice_count']);
  Route::get('inactive_paid_invoice_count', [InvoiceController::class, 'inactive_paid_invoice_count']);
  Route::get('inactive_pending_invoice_count', [InvoiceController::class, 'inactive_pending_invoice_count']);

  Route::get('admin/check_InactiveStatusInvoice', [InvoiceController::class, 'check_InactiveStatusInvoice']); // FOR INVOICE STATUS INACTIVE CHECK AND UPDATE
  Route::get('admin/check_pendingInvoicesStatus', [InvoiceController::class, 'check_pendingInvoicesStatus']); // FOR INVOICE STATUS ACTIVE CHECK AND UPDATE

  Route::get('admin/check_ActivependingInvoices', [InvoiceController::class, 'check_ActivependingInvoices']); // FOR ACTIVE PROFILE STATUS
  Route::get('admin/check_InactivependingInvoices', [InvoiceController::class, 'check_InactivependingInvoices']); // FOR INACTIVE PROFILE STATUS
  Route::get('admin/check_InactivependingInvoicesStatus', [InvoiceController::class, 'check_InactivependingInvoicesStatus']); // FOR INACTIVE PROFILE INVOICE STATUS
  Route::get('admin/check_ActivependingInvoicesStatus', [InvoiceController::class, 'check_ActivependingInvoicesStatus']); // FOR ACTIVE INVOICE STATUS
  Route::get('admin/show_overdueInvoices', [InvoiceController::class, 'show_overdueInvoices']);
  Route::get('admin/show_pendingInvoices', [InvoiceController::class, 'show_pendingInvoices']);
  Route::get('get_quickInvoice_PDT/{id}', [InvoiceController::class, 'get_quickInvoice_PDT']);

  Route::get('statusInactive_paid_invoice_count', [InvoiceController::class, 'statusInactive_paid_invoice_count']);
  Route::get('statusInactive_pending_invoice_count', [InvoiceController::class, 'statusInactive_pending_invoice_count']);

  // FOR EMAIL CONFIG TABLE
  Route::get('get_name', [EmailConfigController::class, 'get_name']);
  Route::get('emailconfigs/show_data', [EmailConfigController::class, 'show_data']);
  Route::get('emailconfigs/show_edit/{id}', [EmailConfigController::class, 'show_edit']);
  Route::post('emailconfigs_store', [EmailConfigController::class, 'emailconfig_store']);

  // POST PROFILE DEDUCTION TYPES TABLE
  Route::post('saveProfileDeductionTypes', [ProfileDeductionTypesController::class, 'store']);
  Route::post('editProfileDeductionTypes', [ProfileDeductionTypesController::class, 'store']);
  Route::post('showProfileDeductionTypes/{id}', [ProfileDeductionTypesController::class, 'show']);
  Route::get('settings/show_profileDeductionType_Button/{profile_id}', [ProfileDeductionTypesController::class, 'show_profileDeductionType_Button']);
  Route::get('settings/show_deduction_data/{profile_id}', [ProfileDeductionTypesController::class, 'show_deduction_data']);
  Route::get('settings/get_deduction/{id}', [ProfileDeductionTypesController::class, 'get_deduction']);
  Route::post('deleteProfileDeductionTypes/{id}', [ProfileDeductionTypesController::class, 'destroy']);

  // FOR INVOICE CONFIG TABLE
  Route::post('saveInvoiceConfig', [InvoiceConfigController::class, 'store']);
  Route::get('show_invoiceConfig_data', [InvoiceConfigController::class, 'show_invoiceConfig_data']);
  Route::get('invoice_config/show_edit/{id}', [InvoiceConfigController::class, 'show_edit']);
  Route::get('get_invoice_config', [InvoiceController::class, 'get_invoice_config']);
  Route::post('invoiceConfig_delete/{id}', [InvoiceConfigController::class, 'destroy']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });