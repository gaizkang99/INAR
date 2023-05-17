<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signin(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    $token = $user->createToken('MyApp')->accessToken;

    return response()->json(['token' => $token], 200);
}

public function loginSuccesful(Request $request)
{
    $credentials = $request->only('email', 'password');
    var_dump($credentials);
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('MyApp')->accessToken;
        return redirect()->route('home');
        // return response()->json(['token' => $token], 200);
    } else {
        return redirect()->route('loginSuccesful');
    }
}

public function logout()
{
    $user = Auth::user();
    $user->tokens()->delete();

    return redirect()->route('loginSuccesful');
}
}
