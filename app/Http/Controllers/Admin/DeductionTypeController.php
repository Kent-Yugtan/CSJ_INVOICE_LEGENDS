<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DeductionType;
use App\Http\Controllers\Controller;

class DeductionTypeController extends Controller
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
     * @param  \App\Models\DeductionType  $deductionType
     * @return \Illuminate\Http\Response
     */
    public function show(DeductionType $deductionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeductionType  $deductionType
     * @return \Illuminate\Http\Response
     */
    public function edit(DeductionType $deductionType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeductionType  $deductionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeductionType $deductionType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeductionType  $deductionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeductionType $deductionType)
    {
        //
    }

    public function deductiontype()
    {
        //
        $user_id = session("LoggedUser");
        $data = ['LoggedUserInfo' => User::select('id', 'first_name', 'last_name')->where('id', '=', $user_id)->first()];
        return view('settings.deductiontype', $data);
    }
}