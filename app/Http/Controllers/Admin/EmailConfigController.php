<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailConfig;
use App\Models\User;
use Illuminate\Http\Request;

class EmailConfigController extends Controller
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
   * @param  \App\Models\EmailConfig  $emailConfig
   * @return \Illuminate\Http\Response
   */
  public function show(EmailConfig $emailConfig)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\EmailConfig  $emailConfig
   * @return \Illuminate\Http\Response
   */
  public function edit(EmailConfig $emailConfig)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\EmailConfig  $emailConfig
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, EmailConfig $emailConfig)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\EmailConfig  $emailConfig
   * @return \Illuminate\Http\Response
   */
  public function destroy(EmailConfig $emailConfig)
  {
    //
  }

  public function show_config()
  {
    return view("settings.emailconfig");
  }

  public function emailconfig_store(Request $request)
  {
    $error = false;
    $emailconfig_id = $request->id;
    if ($error === false) {
      if (!$emailconfig_id) {
        $incoming_data = $request->validate([
          'fullname' => 'required|unique:email_configs',
          'email_address' => 'email|required|unique:email_configs',
          'title' => '',
        ]);

        $store_data = EmailConfig::create($incoming_data);
        return response()->json([
          'success' => true,
          'message' => 'Email Configuration has been successfully added to the database.',
          'data' => $store_data,
        ], 200);
      } else {
        $data = EmailConfig::find($emailconfig_id);
        if ($data->fullname != $request->fullname) {
          $request->validate([
            'fullname' => 'required|unique:email_configs',
          ]);
        }

        if ($data->email_address != $request->email_address) {
          $request->validate([
            'email_address' => 'required|unique:email_configs',
          ]);
        }

        $store_data = EmailConfig::where('id', $emailconfig_id)->update(
          [
            'fullname' => $request->fullname,
            'email_address' => $request->email_address,
            'title' => $request->title,
          ]
        );
        return response()->json([
          'success' => true,
          'message' => 'Email Configuration has been successfully updated to the database.',
          'data' => $store_data,
        ], 200);
      }
    }
  }

  public function show_edit(Request $request)
  {
    $email_config_id = $request->id;
    $email_config = EmailConfig::find($email_config_id);

    return response()->json([
      'success' => true,
      'data' => $email_config,
    ], 200);
  }

  public function show_data(Request $request)
  {
    $email_config = new EmailConfig();

    if ($request->search) {
      $email_config = $email_config->where(
        function ($q) use ($request) {
          $q->orWhere('fullname', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('email_address', 'LIKE', '%' . $request->search . '%');
        }
      );
    }

    if ($request->page_size) {
      $email_config = $email_config->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $email_config = $email_config->get();
    }

    return response()->json([
      'success' => true,
      'data' => $email_config,
    ], 200);
  }
}
