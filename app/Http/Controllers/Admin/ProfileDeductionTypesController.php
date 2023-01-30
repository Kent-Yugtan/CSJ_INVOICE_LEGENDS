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
        $profileDeductionTypes_id = $request->id;
        if ($error === false) {
            if (!$profileDeductionTypes_id) {

                $storeData = ProfileDeductionTypes::Create($request->input());
                return response()->json([
                    'success' => 'true',
                    'message' => 'Deduction has been successfully added to this profile.',
                    'data' => $storeData,
                ]);
            } else {
                // $data = ProfileDeductionTypes::find($profileDeductionTypes_id);

                $store_data = ProfileDeductionTypes::where('id', $profileDeductionTypes_id)->update(
                    [
                        'amount' => $request->amount
                    ]
                );
                return response()->json([
                    'success' => true,
                    'message' => 'Profile Deduction Type has been successfully updated to the database.',
                    'data' => $store_data,
                ], 200);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileDeductionTypes  $profileDeductionTypes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $profileDeductionType_id = $request->id;
        $data = ProfileDeductionTypes::with('deduction_type')->where('id', $profileDeductionType_id)->first();

        return response()->json([
            'success' => true,
            'data' => $data,
        ], 200);
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