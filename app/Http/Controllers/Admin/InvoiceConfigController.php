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
        //
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
