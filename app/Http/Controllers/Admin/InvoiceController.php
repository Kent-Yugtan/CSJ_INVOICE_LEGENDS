<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use App\Models\Invoice;
use App\Models\InvoiceConfig;
use App\Models\InvoiceItems;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\ForeaceditInvoice_;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $invoice_id = $request->id;
        if ($invoice_id) {
            $data = Invoice::with('invoice_items', 'deductions')->find($invoice_id);
            $last_data = $data;

            if (count($data->deductions) > 0) {
                $data->deductions()->delete();
            }
            if (count($data->invoice_items) > 0) {

                $data->invoice_items()->delete();
            }
            $delete_data = Invoice::where('id', $invoice_id)->delete();

            return response()->json([
                'success' => true,
                'message' => "Invoice has been successfully deleted.",
            ], 200);
        }
    }

    // public function add_invoice()
    // {
    //     return view('invoice.add');
    // }

    // CHECK PROFILE
    public function check_profile(Request $request)
    {
        $user_id = $request->id;
        $check_profile = Profile::with(['profile_deduction_types', 'profile_deduction_types.deduction_type'])
            ->where('user_id', $user_id)->first();

        if (!$check_profile) {
            return response()->json([
                'success' => false,
                'message' => "Please create profile before making transactions.",
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => "Success",
                'data' => $check_profile,
            ], 200);
        }
    }

    public function current()
    {
        return view('invoice.current');
    }

    public function inactive()
    {
        return view('invoice.inactive');
    }
    public function current_createinvoice()
    {
        return view('settings.CreateInvoice');
    }
    public function inactive_profile()
    {
        return view('admin.inactive');
    }
    public function add_invoice()
    {
        return view('invoice.addInvoice');
    }
    public function edit_invoice()
    {
        return view('admin.editInvoice');
    }

    // User
    public function useredit_invoice()
    {
        return view('user.usereditInvoice');
    }

    public function editInvoice(Request $request)
    {
        $invoice_id = $request->id;
        // $invoice = Invoice::with('profile.deduction.profile_deduction_types.deduction_type', 'invoice_items', 'profile.user')->where('id', $invoice_id)->first();
        $invoice = Invoice::with('deductions.profile_deduction_types.deduction_type', 'invoice_items', 'profile.user')->where('id', $invoice_id)->first();

        return response()->json([
            'success' => true,
            'data' => $invoice,

        ]);
    }


    public function update_status(Request $request)
    {
        $invoice_id = $request->id;
        $data = Invoice::find($invoice_id);

        $data->fill([
            'id' => $invoice_id,
            'invoice_status' => $request->invoice_status,
        ])->save();

        return response()->json([
            'success' => true,
            'message' => "Invoice status has been successfully updated.",
            'data' => $data,
        ]);
    }

    public function create_invoice(Request $request)
    {
        $error = false;
        $profile_id = $request->profile_id;
        $invoice_id = $request->invoice_id;
        $invoiceItems_id = $request->invoiceItems_id;
        if ($error === false) {
            // STORE
            if ($profile_id) {
                $incoming_data = $request->validate(
                    [
                        'profile_id' => '',
                        'description' => 'required',
                        'sub_total' => '',
                        'peso_rate' => '',
                        'converted_amount' => '',
                        'discount_type' => '',
                        'discount_amount' => '',
                        'discount_total' => '',
                        'grand_total_amount' => '',
                        'notes' => '',
                    ]
                );
                $incoming_data += [
                    'invoice_status' => 'Pending',
                    'invoice_no' => $this->generate_invoice(),
                ];
                $store_data = Invoice::create($incoming_data);

                if ($store_data) {

                    if ($request->invoiceItem) {
                        foreach ($request->invoiceItem as $key => $value) {
                            $datainvoiceitem = [
                                'item_description' => $value['item_description'],
                                'quantity' => $value['item_qty'],
                                'rate' => $value['item_rate'],
                                'total_amount' => $value['item_total_amount'],
                            ];
                            $store_data->invoice_items()->create($datainvoiceitem);
                        }
                    }

                    if ($request->Deductions) {
                        foreach ($request->Deductions as $key => $value) {
                            $dataDeductions = [
                                'profile_id' => $request->profile_id,
                                'profile_deduction_type_id' => $value['profile_deduction_type_id'],
                                'amount' => $value['deduction_amount'],
                            ];
                            $store_data->deductions()->create($dataDeductions);
                        }
                    }
                }
                return response()->json([
                    'success' => true,
                    'message' => "Invoice has been successfully added to the database.",
                    'data' => $store_data,
                ], 200);
            }
            // UPDATE
            if ($invoiceItems_id && $invoice_id) {
                $invoice_data = Invoice::find($invoice_id);
                if ($invoiceItems_id) {
                    $delete = InvoiceItems::where('id', $invoiceItems_id)->delete();

                    return response()->json([
                        'success' => true,
                        'message' => "Invoice Items has been successfully removed.",
                        'data' =>  $delete,
                    ], 200);
                }
                if ($invoice_data) {
                    $incoming_data = $request->validate(
                        [
                            'description' => 'required',
                        ],
                    );
                    $incoming_data += [
                        'profile_id' => $invoice_data->profile_id,
                        'sub_total' => $request->subtotal,
                        'peso_rate' => $request->peso_rate,
                        'converted_amount' => $request->converted_amount,
                        'discount_type' => $request->discount_type,
                        'discount_amount' => $request->discount_amount,
                        'discount_total' => $request->discount_total,
                        'grand_total_amount' => $request->grand_total_amount,
                        'notes' => $request->notes,
                        'invoice_status' => 'Pending'
                    ];

                    $invoice_update_data = $invoice_data->fill($incoming_data)->save();

                    if ($request->invoiceItem) {
                        foreach ($request->invoiceItem as $key => $value) {
                            if (!empty($value['item_invoice_id'])) {
                                $find_invoice_items = InvoiceItems::find($value['item_invoice_id']);
                                if ($find_invoice_items) {
                                    $find_invoice_items->fill([
                                        'item_description' => $value['item_description'],
                                        'quantity' => $value['item_qty'],
                                        'rate' => $value['item_rate'],
                                        'total_amount' => $value['item_total_amount'],
                                    ])->save();
                                }
                            } else {
                                $store_data = InvoiceItems::create(
                                    [
                                        'invoice_id' => $invoice_id,
                                        'item_description' => $value['item_description'],
                                        'quantity' => $value['item_qty'],
                                        'rate' => $value['item_rate'],
                                        'total_amount' => $value['item_total_amount'],
                                    ]
                                );
                            }
                        }
                    }

                    if ($request->Deductions) {
                        foreach ($request->Deductions as $key => $value) {
                            $find_deductions = Deduction::find($value['deduction_id']);
                            if ($find_deductions) {
                                $find_deductions->fill([
                                    'amount' => $value['deduction_amount'],
                                ])->save();
                            }
                        }
                    }
                    return response()->json([
                        'success' => true,
                        'message' => "Invoice has been successfully updated to the database.",
                        'data' => $invoice_update_data,
                    ], 200);
                }
            }
            if ($invoice_id) {
                $invoice_data = Invoice::find($invoice_id);
                if ($invoice_data) {
                    $incoming_data = $request->validate(
                        [
                            'description' => 'required',
                        ],
                    );
                    $incoming_data += [
                        'profile_id' => $invoice_data->profile_id,
                        'sub_total' => $request->subtotal,
                        'peso_rate' => $request->peso_rate,
                        'converted_amount' => $request->converted_amount,
                        'discount_type' => $request->discount_type,
                        'discount_amount' => $request->discount_amount,
                        'discount_total' => $request->discount_total,
                        'grand_total_amount' => $request->grand_total_amount,
                        'notes' => $request->notes,
                        'invoice_status' => 'Pending'
                    ];

                    $invoice_update_data = $invoice_data->fill($incoming_data)->save();

                    if ($request->invoiceItem) {
                        foreach ($request->invoiceItem as $key => $value) {
                            if (!empty($value['item_invoice_id'])) {
                                $find_invoice_items = InvoiceItems::find($value['item_invoice_id']);
                                if ($find_invoice_items) {
                                    $find_invoice_items->fill([
                                        'item_description' => $value['item_description'],
                                        'quantity' => $value['item_qty'],
                                        'rate' => $value['item_rate'],
                                        'total_amount' => $value['item_total_amount'],
                                    ])->save();
                                }
                            } else {
                                $store_data = InvoiceItems::create(
                                    [
                                        'invoice_id' => $invoice_id,
                                        'item_description' => $value['item_description'],
                                        'quantity' => $value['item_qty'],
                                        'rate' => $value['item_rate'],
                                        'total_amount' => $value['item_total_amount'],
                                    ]
                                );
                            }
                        }
                    }

                    if ($request->Deductions) {
                        foreach ($request->Deductions as $key => $value) {
                            $find_deductions = Deduction::find($value['deduction_id']);
                            if ($find_deductions) {
                                $find_deductions->fill([
                                    'amount' => $value['deduction_amount'],
                                ])->save();
                            }
                        }
                    }
                    return response()->json([
                        'success' => true,
                        'message' => "Invoice has been successfully updated to the database.",
                        'data' => $invoice_update_data,
                    ], 200);
                }
            }
        }
    }

    public function get_invoice_config()
    {
        $invoice_config = InvoiceConfig::orderBy('id', 'desc')->first();

        return response()->json([
            'success' => true,
            'data' => $invoice_config,
        ], 200);
    }

    public function count_pending()
    {
        $pending = Invoice::where('invoice_status', 'Pending')->count();
        if ($pending) {
            return $pending;
        }
    }
    public function count_overdue()
    {
        $overdue = Invoice::where('invoice_status', 'Overdue')->count();
        if ($overdue) {
            return $overdue;
        }
    }
    public function count_paid()
    {
        $paid = Invoice::where('invoice_status', 'Paid')->count();
        if ($paid) {
            return $paid;
        }
    }
    public function count_cancelled()
    {
        $cancelled = Invoice::where('invoice_status', 'Cancelled')->count();
        if ($cancelled) {
            return $cancelled;
        }
    }

    public function getInvoiceStatus(Request $request)
    {
        $invoice_no = $request->id;
        if ($invoice_no) {

            $data = Invoice::find($invoice_no);

            return response()->json([
                'success' => true,
                'data' => $data->invoice_status,
            ]);
        }
    }
    public function show_deductions_dataONdeductions(Request $request)
    {

        $deductions = Deduction::with('invoice', 'profile_deduction_types.deduction_type')
            ->where('profile_id', $request->profile_id);

        if (isset($request->search)) {
            $deductions = $deductions->where(
                function ($q) use ($request) {
                    $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
                }
            );
        }

        if (isset($request->filter_all_deductions)) {
            if ($request->filter_all_deductions == 'All') {
                $deductions =  $deductions->whereHas('invoice', function ($query) use ($request) {
                    $query->where('invoice_status', '<>', '');
                });
            } else {
                $deductions =  $deductions->whereHas('invoice', function ($query) use ($request) {
                    $query->where('invoice_status', $request->filter_all_deductions);
                });
            }
        }

        $deductions = $deductions->orderby('created_at', 'desc');

        if ($request->page_size) {
            $deductions = $deductions->limit($request->page_size)
                ->paginate($request->page_size, ['*'], 'page', $request->page)
                ->toArray();
        } else {
            $deductions = $deductions->get();
        }

        return response()->json([
            'success' => true,
            'data' => $deductions,
        ]);
    }
    public function show_invoice(Request $request)
    {
        $findProfile = Profile::firstWhere('user_id', $request->user_id);

        $invoices = Invoice::with('profile.user', 'deductions.profile_deduction_types.deduction_type', 'invoice_items')
            ->where('profile_id', $findProfile->id);

        if (isset($request->search)) {
            $invoices = $invoices->where(
                function ($q) use ($request) {
                    $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
                }
            );
        }

        if (isset($request->filter_all_invoices)) {
            if ($request->filter_all_invoices == 'All') {
                $invoices = $invoices->where('invoice_status', '<>', '');
            } else {
                $invoices = $invoices->where('invoice_status', $request->filter_all_invoices);
            }
        }

        $invoices = $invoices->orderby('created_at', 'desc');

        if ($request->page_size) {
            $invoices = $invoices->limit($request->page_size)
                ->paginate($request->page_size, ['*'], 'page', $request->page)
                ->toArray();
        } else {
            $invoices = $invoices->get();
        }

        return response()->json([
            'success' => true,
            'data' => $invoices,
        ], 200);
    }

    public function show_edit_invoice(Request $request)
    {
        $invoice_id = $request->invoice_id;
        if ($invoice_id) {
            $data = Invoice::with('deductions.profile_deduction_types.deduction_type', 'invoice_items')
                ->where('id', $invoice_id)->first();

            return response()->json([
                'success' => true,
                'data' => $data,
            ], 200);
        }
    }
}
