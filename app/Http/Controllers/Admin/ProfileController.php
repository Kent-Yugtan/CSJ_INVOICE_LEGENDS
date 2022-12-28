<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
        $data = ['LoggedUserInfo'=>User::select('id','first_name','last_name')->where('id' , '=' ,  $id)->first()];
            return view('admin.profile',$data);
            
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
        //return $request->input();
        $user_id = session('LoggedUser');
        
        if($user_id){
            $incoming_data = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'position' => 'required',
                'phone_number' => 'required',
                'address' => 'required',
                'province' => 'required',
                'city' => 'required',
                'zip_code' => 'required',
                'profile_status' => 'required',
                'acct_no' => 'required|unique:profiles',
                'acct_name' => 'required|unique:profiles',
                'bank_name' => 'required',
                'bank_location' => 'required',
                'gcash_no' => 'required|unique:profiles',
                'date_hired' => 'required',
            ]);

            if ($request->file('profile_picture')) {
                $userImageFile = $request->file('profile_picture');
                $userImageFileName = $userImageFile->getClientOriginalName();
                $userImageFilePath = time() . '' . $userImageFile->getClientOriginalName();
                $filename =  $userImageFilePath;
                $userImageFilePath = $userImageFile->storeAs('images/storage', $userImageFilePath, 'public');
    
                $userImageFileSize = $this->formatSizeUnits($userImageFile->getSize());
                $path = '' . $userImageFilePath;
    
                $profile_store = Profile::Create(
                    [
                    'user_id' => $user_id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'position' => $request->position,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                    'province' => $request->province,
                    'city' => $request->city,
                    'zip_code' => $request->zip_code,
                    'profile_status' => $request->profile_status,
                    'acct_no' => $request->acct_no,
                    'acct_name' => $request->acct_name,
                    'bank_name' => $request->bank_name,
                    'bank_location' => $request->bank_location,
                    'gcash_no' => $request->gcash_no,
                    'file_original_name'=>$userImageFile->getClientOriginalName(),
                            'file_name'=> $filename,
                            'file_path'=>$path,
                            'file_size'=>$userImageFileSize,
                    'date_hired' => $request->date_hired,
                    ]
                );
                
                if($profile_store){
                    return back()->with('success','Your Profile has been successfuly added to the database');
                }else{
                    return back()->with('fail', 'Something went wrong, try again later');
                }    
            }
        }else{
            return back()->with('fail', 'Something went wrong(USER), try again later');
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
    public function edit(Profile $profile , $id)
    {
        //
        $profile = Profile::find($id);
        return $profile;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
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

    public function current(){
        return view('admin.current');
    }

    public function inactive(){
        return view('admin.inactive');
    }

    public function viewProfile(){
        return view('admin.viewProfile');
    }
    public function editProfile(){
        return view('admin.editProfile');
    }
}