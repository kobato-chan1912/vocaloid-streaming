<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function Register(Request $request){
        $request->validate([
           'email' => 'required|unique:users',
            'name' => 'required|unique:users',
            'password' => 'required',
            're-password' => 'required'
        ]);
    }
}
