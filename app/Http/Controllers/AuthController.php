<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;



class AuthController extends ShowController
{
    public function register(Request $request)
    {
        $createUser = User::Create([
            'username' => $request->username,
            'email' => $request->email, 
            'password' => bcrypt($request->password),
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return $this->showResultSuccess( $createUser, 'Success', 201 );
    }  
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return  response()->json([
                'data' => 'success'
            ]);
        } else {
            return  response()->json([
                'data' => 'fail'
            ]);
        }  
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return $this->showResultSuccess(null,'Logout success', 200 );
    }
    public function guard()
    {
        return Auth::guard();
    }
}
