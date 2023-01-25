<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function check_profile()
    {
        $user_id = auth()->user()->id;
        $check_profile = Profile::select([
            'profiles.*',
            DB::raw('(SELECT
                     SUM(amount)
                 FROM profile_deduction_types WHERE
                 profile_deduction_types.profile_id = profiles.id) as `total_deduction`')
        ])->with(['profile_deduction_types', 'profile_deduction_types.deduction_type'])
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
                'invoice_no' => $this->generate_invoice($check_profile->id),
            ], 200);
        }
    }

    public function generate_invoice($profile_id)
    {
        $last_invoice = Invoice::where('profile_id', $profile_id)->orderBy('invoice_no', 'desc')->first();
        $last_num = 0;
        if ($last_invoice) {
            // $last_num = $last_invoice->invoice_no != null ? $last_invoice->invoice_no + 1 : 00001;
            $last_num = (int) str_replace('5PP-', "", $last_invoice->invoice_no);
            $_last_num = str_pad($last_num + 1, 5, '0', STR_PAD_LEFT);
            $last_num = '5PP-' . $_last_num;
        } else {
            // $last_num = 00001;
            $last_num = '5PP-00001';
        }
        // $invoice_num = sprintf("%05d", $last_num);
        return $last_num;
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
        return view('invoice.add');
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
                        'invoice_no' => '',
                        'description' => 'required',
                        'sub_total' => '',
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
                                'deduction_type_id' => $value['deduction_type_id'],
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
}