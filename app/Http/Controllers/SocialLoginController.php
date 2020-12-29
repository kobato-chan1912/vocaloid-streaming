<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    //
    public function login(){
        return Socialite::driver('facebook')->redirect();
    }
    public function callback(){
//        $user = Socialite::driver('facebook')->user();

    }
}
