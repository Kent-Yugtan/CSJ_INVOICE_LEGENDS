<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Faker\Extension\CompanyExtension;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.profile');
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

        $user_id = auth()->user()->id;
        $profile_id = $request->id;

        $error = false;

        if (!$user_id) {
            $error = true;
            return back()->with('fail', 'Something went wrong(USER), try again later');
        }

        if ($error === false) {
            $incoming_data = $request->validate(
                [
                    'profile_status' => 'required',
                    'full_name' => 'required',
                    'position' => 'required',
                    'phone_number' => 'required',
                    'address' => 'required',
                    'province' => 'required',
                    'city' => 'required',
                    'zip_code' => 'required',
                    'bank_name' => 'required',
                    'bank_location' => 'required',
                    'date_hired' => 'required',
                ]
            );

            if ($request->file('profile_picture')) {
                $userImageFile = $request->file('profile_picture');
                $userImageFileName = $userImageFile->getClientOriginalName();
                $userImageFilePath = time() . '' . $userImageFile->getClientOriginalName();
                $filename =  $userImageFilePath;
                $userImageFilePath = $userImageFile->storeAs('/images', $userImageFilePath, 'public');

                $userImageFileSize = $this->formatSizeUnits($userImageFile->getSize());
                // $path = $userImageFilePath;
                $path = '/storage/' . $userImageFilePath;

                $incoming_data += [
                    'file_original_name' => $userImageFileName,
                    'file_name' => $userImageFilePath,
                    'file_path' => $path,
                    'file_size' => $userImageFileSize,
                ];
            }

            if (!$profile_id) {
                $incoming_data += $request->validate([
                    'acct_no' => 'required|unique:profiles',
                    'acct_name' => 'required|unique:profiles',
                    'gcash_no' => 'required|unique:profiles',
                ]);
            } else {
                $incoming_data += [
                    'acct_no' => $request->acct_no,
                    'acct_name' => $request->acct_name,
                    'gcash_no' => $request->gcash_no,
                ];
            }

            $profile_store = Profile::updateOrCreate(
                [
                    'id' => $request->id,
                    'user_id' => $user_id,
                ],
                $incoming_data,
            );
            $profile_store->save();

            if (!$profile_id) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your Profile has been successfully added to the database.',
                ], 200);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Your Profile has been successfully updated to the database.',
                ], 200);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile_id = $id;
        return view("admin.editProfile", compact('profile_id'));
    }

    public function show_edit(Request $request, $id)
    {
        $profile = Profile::find($request->id);

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'ID ' . $id . ' not found'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $profile,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function current_show(Request $request)
    {
        return view('admin.current');
    }

    public function current_show_data(Request $request)
    {
        // $profiles = Profile::all();
        // return view('admin.current', ['profiles' => $profiles]);
        $profiles = Profile::where([
            ['full_name', '!=', Null],
            ['profile_status', '=', 'Active'],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('full_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('position', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->Paginate(5);

        return response()->json([
            'success' => true,
            'data' => $profiles,
        ], 200);
    }


    public function inactive()
    {
        return view('admin.inactive');
    }

    public function viewProfile()
    {
        return view('admin.viewProfile');
    }
    public function editProfile()
    {
        return view('admin.editProfile');
    }
}