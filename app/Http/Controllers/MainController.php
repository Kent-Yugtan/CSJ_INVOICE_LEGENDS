<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class MainController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function save_user(Request $request){
        // return $request->input();

        $request->validate([
            'first_name' => 'required',
            'last_name' =>'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:5|max:12|confirmed',
            'password_confirmation' => 'required|min:5|max:12',
        ]);
        
        // INSERT TO ADMIN
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $save = $user->save();

        if($save){
            return back()->with('success','New User has been successfuly added to the database');
        }else{
            return back()->with('fail', 'Something went wrong, try again later');
        }        
    }

    public function check_login(Request $request){
        // return $request->input();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);

        $userInfo = User::where('email', '=' ,$request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize you email address');
        }else{
            // CHECK PASSWORD
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('LoggedUser',$userInfo->id);
                return redirect('admin/dashboard');
            }else{
                return back()->with('fail','Incorrect Password');
            }
        }
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');

        }
    }
}