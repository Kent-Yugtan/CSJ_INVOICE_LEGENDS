<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        //
        // $id = session('LoggedUser');
        // $data = ['LoggedUserInfo' => User::select('id', 'first_name', 'last_name')->where('id', '=',  $id)->first()];
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
        $id = $request->id;

        $error = false;

        if (!$user_id) {
            $error = true;
            return back()->with('fail', 'Something went wrong(USER), try again later');
        }

        if ($error === false) {
            $incoming_data = $request->validate(
                [
                    'full_name' => 'required',
                    'position' => 'required',
                    'phone_number' => 'required',
                    'address' => 'required',
                    'province' => 'required',
                    'city' => 'required',
                    'zip_code' => 'required',
                    'profile_status' => 'required',
                    'bank_name' => 'required',
                    'bank_location' => 'required',
                    'date_hired' => 'required',
                    'acct_no' => 'required|unique:profiles',
                    'acct_name' => 'required|unique:profiles',
                    'gcash_no' => 'required|unique:profiles',
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

            if (!$id) {
                $incoming_data += [
                    'acct_no' => $request->acct_no,
                    'acct_name' => $request->acct_name,
                    'gcash_no' => $request->gcash_no,
                ];
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

            return response()->json([
                'success' => true,
                'message' => 'Your Profile has been successfully added to the database.',
                'data' => $error,
            ], 200);
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
        // $profiles = Profile::all();
        // return view('admin.current', ['profiles' => $profiles]);
        $profiles = Profile::where([
            ['full_name', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('full_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('position', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->Paginate(5);
        return view('admin.current', compact($profiles))->render();
    }

    public function ajax_data_current_show(Request $request)
    {
        if ($request->ajax()) {
            $data = Profile::paginate(5);
            return view('admin.current', compact('data'))->render();
        }
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