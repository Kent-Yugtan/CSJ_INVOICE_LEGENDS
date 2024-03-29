<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $data = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];
    return view('/admin/dashboard', $data);
    // return "ADMIN DASHBOARD";
  }

  public function user_index()
  {
    //
    $data = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];
    return view('/user/dashboard', $data);
    // return "ADMIN DASHBOARD";
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
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  public function userindex()
  {
    return view('user/userdashboard');
    //

    // $data = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];
    // return view('/admin/dashboard', $data);
    // return "ADMIN DASHBOARD";
  }
}
