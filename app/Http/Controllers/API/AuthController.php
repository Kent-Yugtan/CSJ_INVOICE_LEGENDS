<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  //
  public function register(Request $request)
  {
    $data = $request->validate([
      'first_name' => 'required|string|max:191',
      'last_name' => 'required|string|max:191',
      'email' => 'required|email|max:191|unique:users,email',
      'username' => 'required|string|max:191|unique:users',
      'password' => 'required|string',
    ]);

    $user = User::create([
      'first_name' => $data['first_name'],
      'last_name' => $data['last_name'],
      'email' => $data['email'],
      'username' => $data['username'],
      'password' => Hash::make($data['password']),
    ]);

    $token = $user->createToken('csjInvoiceToken')->plainTextToken;

    $response = [
      'user' => $user,
      'token' => $token,
    ];
    return response()->json($response, 201);
  }

  public function logout(Request $request)
  {
    // Revoke all tokens...
    Auth::user()->tokens()->delete();
    Auth::guard('web')->logout();
    return response()->json([
      'success' => true,
      'message' => 'Logged Out Successfully.',
    ]);
  }

  public function login(Request $request)
  {
    $data = $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);

    if (auth()->attempt($data)) {
      $user = auth()->user();
      $token = $user->createToken('csjInvoiceTokenLogin')->plainTextToken;

      $response = [
        'succcess' => true,
        'user' => $user,
        'token' => $token,
      ];
      return response()->json($response, 200);
    } else {
      return response()->json([
        'success' => false,
        'message' => 'Unrecognized Credentials.',
      ], 200);
    }
  }
}
