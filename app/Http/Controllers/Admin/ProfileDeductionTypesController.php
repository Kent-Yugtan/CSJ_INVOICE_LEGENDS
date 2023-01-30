<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileDeductionTypes;
use Illuminate\Http\Request;

class ProfileDeductionTypesController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $error = false;
        $profileDeductionTypes = $request->id;
        if ($error === false) {
            if (!$profileDeductionTypes) {

                $storeData = ProfileDeductionTypes::Create($request->input());
                return response()->json([
                    'success' => 'true',
                    'message' => 'Deduction has been successfully added to this profile.',
                    'data' => $storeData,
                ]);
            } else {
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileDeductionTypes  $profileDeductionTypes
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileDeductionTypes $profileDeductionTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileDeductionTypes  $profileDeductionTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileDeductionTypes $profileDeductionTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileDeductionTypes  $profileDeductionTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $profileDeductionType_id = $request->id;
        if ($profileDeductionType_id) {
            $profileDeductionTypes = ProfileDeductionTypes::where('id', $profileDeductionType_id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Deduction has been successfully removed from the profile.',
                'data' => $profileDeductionTypes,
            ]);
        }
    }
}