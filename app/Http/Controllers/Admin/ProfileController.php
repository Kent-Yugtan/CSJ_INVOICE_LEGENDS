<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $error = false;
        $user_id = $request->id;
        $profile_id = $request->profile_id;

        $findUser = User::with('profile')->find($user_id);
        if (!$user_id) {
            $request->validate([
                'acct_no' => 'required|unique:profiles',
                'acct_name' => 'required|unique:profiles',
                'gcash_no' => 'required|unique:profiles',
                'email' => 'required|unique:users',
            ]);
            // return "NO USER ID";
        } else {
            if ($findUser) {
                if ($findUser->profile) {

                    if ($findUser->profile->acct_no !== $request->acct_no) {
                        $request->validate([
                            'acct_no' => 'required|unique:profiles',
                        ]);
                    }

                    if ($findUser->profile->acct_name != $request->acct_name) {
                        $request->validate([
                            'acct_name' => 'required|unique:profiles',
                        ]);
                    }

                    if ($findUser->profile->gcash_no != $request->gcash_no) {
                        $request->validate([
                            'gcash_no' => 'required|unique:profiles',
                        ]);
                    }
                }
                if ($findUser->email != $request->email) {
                    $request->validate([
                        'email' => 'required|unique:users',
                    ]);
                }
            }
        }

        if ($error === false) {
            $incoming_data = $request->validate(
                [
                    'profile_status' => 'required',
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

            if (!$user_id) {
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

            $userCreateData = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'username' => $request->username,
                'role' => 'Staff',
            ];

            if ($request->password) {
                $userCreateData += [
                    'password' => Hash::make($request->password)
                ];
            }

            $userCreate = User::updateOrCreate(
                [
                    'id' => $user_id,
                ],
                $userCreateData
            );

            if ($userCreate) {
                if ($user_id) {
                    if ($findUser->profile) {
                        $userCreate->profile()->where('id', $findUser->profile->id)->update(
                            $incoming_data,
                        );
                    } else {
                        $userCreate->profile()->create(
                            $incoming_data,
                        );
                    }
                } else {
                    $userCreate->profile()->create(
                        $incoming_data,
                    );
                }
            }

            if (!$user_id) {
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
    public function edit(Request $request)
    {
        $findid = User::with('Profile')->find($request->id);
        // return $findid;
        return view("admin.editProfile", compact('findid'));
    }

    public function show_edit(Request $request, $id)
    {

        $finduser_profile = User::with('Profile')->find($id);

        if (!$finduser_profile) {
            return response()->json([
                'success' => false,
                'message' => 'ID ' . $request->id . ' not found'
            ], 400);
        }

        if ($finduser_profile->profile) {
            return response()->json([
                'success' => true,
                'data' => $finduser_profile,
            ]);
        } else {
            $find_userid = User::find($id);
            return response()->json([
                'success' => true,
                'data' => $find_userid,
            ]);
        }
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
        $data = User::select(
            [
                'users.*',
                'position',
                'phone_number',
                'address',
                'province',
                'city',
                'zip_code',
                'profile_status',
                'acct_no',
                'acct_name',
                'bank_name',
                'bank_location',
                'gcash_no',
                'date_hired',
                'file_name',
                'file_original_name',
                'file_path',
                'file_size',
                DB::raw("CONCAT(first_name, ' ', last_name) full_name")
            ],
        )->profile()->where('profile_status', 'Active');

        if ($request->search) {
            $data = $data->where(
                function ($q) use ($request) {
                    $q->orWhere(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', '%' . $request->search . '%');
                    $q->orWhere('position', 'LIKE', '%' . $request->search . '%');
                }
            );
        }

        if ($request->page_size) {
            $data = $data->limit($request->page_size)
                ->paginate($request->page_size, ['*'], 'page', $request->page)
                ->toArray();
        } else {
            $data = $data->get();
        }

        return response()->json([
            'success' => true,
            'data' => $data,
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