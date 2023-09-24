<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(Request $request) {
        try {
            $data = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|unique:users|max:255',
                'password' => 'required|min:6'
            ]);
        } catch (\Throwable $th) {
            return response([
                'error_message' => 'Validation failed!'
            ]);
        }
        
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('auth_token')->accessToken;

        return response([
            'user' => $user,
            'token' => $token 
        ]);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' => 'The provided credentials are incorrect'
            ]);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response([
            'user' => auth()->user(),
            'token' => $token 
        ]);
    }
}
