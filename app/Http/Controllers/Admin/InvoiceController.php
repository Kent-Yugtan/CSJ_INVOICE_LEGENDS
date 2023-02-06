<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use App\Models\Invoice;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

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
    public function destroy(Invoice $invoice)
    {
        //
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
    public function create_invoice(Request $request)
    {
        $error = false;
        $profile_id = $request->profile_id;
        if ($error === false) {
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

                    return response()->json([
                        'success' => true,
                        'message' => "Invoice has been successfully added to the database.",
                        'data' => $store_data,
                    ], 200);
                }
            }
        }
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