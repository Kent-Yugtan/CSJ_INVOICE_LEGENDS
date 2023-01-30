<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoiceConfig;
use Illuminate\Http\Request;


class InvoiceConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('<invoice_configs></invoice_configs>')
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
    public function invoiceconfigs_store(Request $request)
    {
        $error = false;
        $invoiceconfigs_id = $request->id;
        if ($error === false) {
            if (!$invoiceconfigs_id) {
                $incoming_data = $request->validate([
                    'invoice_title' => 'required|unique:invoice_configs',
                    'invoice_email' => 'email|required|unique:invoice_configs',
                    'bill_address' => 'required|unique:invoice_configs',
                    'ship_address' => 'required|unique:invoice_configs',
                    'title' => '',
                ]);
                $store_data = InvoiceConfig::create($incoming_data);
                return response()->json([
                    'success' => true,
                    'message' => 'Invoice Configuration has been successfully added to database.',
                    'data' => $store_data,

                ], 200);
            } else {
                $data = InvoiceConfig::find($invoiceconfig_id);
                if ($data->invoice_title != $request->invoice_title) {
                    $request->validate([
                        'invoice_title' => 'required|',

                    ]);
                }

                if ($data->invoice_email != $request->invoice_email) {
                    $request->validate([
                        'invoice_email' => 'required|unique:invoice_configs',
                    ]);
                }

                $store_data = InvoiceConfig::where('id', $invoiceConfig_id)->update(
                    [
                        'invoice_email' => $request->invoice_email,
                        'title' => $request->title,
                    ]
                );
                return response()->json([
                    'success' => true,
                    'message' => 'Email Configuration has been successfully updated to the database.',
                    'data' => $store_data,

                ], 200);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceConfig  $invoiceConfig
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceConfig $invoiceConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceConfig  $invoiceConfig
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceConfig $invoiceConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceConfig  $invoiceConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceConfig $invoiceConfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceConfig  $invoiceConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceConfig $invoiceConfig)
    {
        //
    }

    public function show_invoiceconfig()
    {
        return view("settings.invoiceconfig");
    }


    public function show_editinvoice()
    {
        return view("settings.editinvoice");
    }
}
