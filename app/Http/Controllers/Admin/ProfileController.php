<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

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
        $id = session('LoggedUser');
        $data = ['LoggedUserInfo' => User::select('id', 'first_name', 'last_name')->where('id', '=',  $id)->first()];
        return view('admin.profile', $data);
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
        $user_id = session('LoggedUser');
        $id = $request->id;

        $error = false;

        if (!$user_id) {
            $error = true;
            return back()->with('fail', 'Something went wrong(USER), try again later');
        }

        if ($error == false) {
            $incoming_data = $request->validate([
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
            ]);

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
                    'acct_no' => 'required|unique:profiles',
                    'acct_name' => 'required|unique:profiles',
                    'gcash_no' => 'required|unique:profiles',
                ];
            } else {
                $incoming_data += [
                    'acct_no' => 'required',
                    'acct_name' => 'required',
                    'gcash_no' => 'required',
                ];
            }

            $profile_store = Profile::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                $incoming_data
            );

            if ($profile_store) {
                if (!$request->id) {
                    return back()->with('success', 'Your Profile has been successfuly added to the database');
                } else {
                    return back()->with('success', 'Your Profile has been successfuly updated to the database');
                }
            } else {
                return back()->with('fail', 'Something went wrong, try again later');
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
        //
        $user_id = session('LoggedUser');
        $data = ['LoggedUserInfo' => User::select('id', 'first_name', 'last_name')->where('id', '=',  $user_id)->first()];
        $profile = Profile::findOrFail($id);

        // return $profile;
        return view('admin.editProfile', $data, compact('profile', $profile));
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
        //
        $user_id = session('LoggedUser');
        $data = ['LoggedUserInfo' => User::select('id', 'first_name', 'last_name')->where('id', '=',  $user_id)->first()];
        $profiles = Profile::findorFail($id);

        // if ($request->hasfile('profile_picture')) {
        //     $destination = $profiles->file_path;
        //     if(File::exists($destination)){
        //         File::delete($destination);
        //     }

        //     $userImageFile = $request->file('profile_picture');
        //     $userImageFileName = $userImageFile->getClientOriginalName();
        //     $userImageFilePath = time() . '' . $userImageFile->getClientOriginalName();
        //     $filename =  $userImageFilePath;
        //     $userImageFilePath = $userImageFile->storeAs('/images/storage', $userImageFilePath,'public');

        //     $userImageFileSize = $this->formatSizeUnits($userImageFile->getSize());
        //     // $path = $userImageFilePath;
        //     $path = '/public/storage/' . $userImageFilePath;


        //     $profiles = Profile::update(
        //         [
        //             'id' => $request->id,
        //         ],
        //         [
        //         'user_id' => $user_id,
        //         'full_name' => $request->full_name,
        //         'position' => $request->position,
        //         'phone_number' => $request->phone_number,
        //         'address' => $request->address,
        //         'province' => $request->province,
        //         'city' => $request->city,
        //         'zip_code' => $request->zip_code,
        //         'profile_status' => $request->profile_status,
        //         'acct_no' => $request->acct_no,
        //         'acct_name' => $request->acct_name,
        //         'bank_name' => $request->bank_name,
        //         'bank_location' => $request->bank_location,
        //         'gcash_no' => $request->gcash_no,
        //         'file_original_name'=>$userImageFile->getClientOriginalName(),
        //                 'file_name'=>$filename,
        //                 'file_path'=>$path,
        //                 'file_size'=>$userImageFileSize,
        //         'date_hired' => $request->date_hired,
        //     ]);

        //     return "SUCCESS";
        // }else{
        //     return "ERROR";
        // }
        return $profiles;
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

    public function current(Request $request)
    {
        $user_id = session('LoggedUser');
        $data = ['LoggedUserInfo' => User::select('id', 'first_name', 'last_name')->where('id', '=',  $user_id)->first()];

        $profiles = Profile::where([
            ['full_name', '!=', Null],
            ['user_id', $user_id],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('full_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('position', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->Paginate(5);


        return view('admin.current', $data, compact('profiles'));
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