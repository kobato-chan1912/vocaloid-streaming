<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function GetLogin(Request $request){
        if ($request->session()->has("LoggedUser")) {
            return redirect(url()->previous());
        }
        else {
            $request->session()->put("previous", url()->previous());
            $request->session()->put("current", url()->current());
            return view('Auth.login');
        }
    }
    public function Register(Request $request){
        $request->validate([
           'email' => 'required|unique:users',
            'name' => 'required|unique:users',
            'password' => 'required',
            're-password' => 'required'
        ]);

        // if validate passed, insert into database.

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->avatar_img = "img/avatar/default.jpg";
        $user->verify_id = 2;
        $user->roles_id = 2;
        $query = $user->save();

        return redirect()->route('login')->with(["success" => "Your account has been created. Please Log in."]);

    }
    public function Login (Request $request){
        $user = User::where('email', '=', $request->email)->first();
        if ($user){
            if (Hash::check($request->password, $user->password))
            {
                $request->session()->put('LoggedUser', $user); // Logged in.
                if (strpos(session("previous"), "register") !== false){

                }
                if (session("previous") != (session("current"))) {
                    if (strpos(session("previous"), "register") !== false){ //found register.
                        return redirect()->route('home');
                    }
                    else {
                        return redirect(session('previous'));
                    }
                }
                else {
                    return redirect()->route('home');
            }
            }
            else {
                return view('Auth.login', ["incorrect" => "Password is wrong."]);

            }
        }
        else {
            return view('Auth.login', ["message" => "Account not found."]);
        }

    }
    public function logout(Request $request){
        $request->session()->forget("LoggedUser");
        if ((url()->current()) == (url()->previous())){
            return redirect()->route('home');
        }
        else {
            return redirect(url()->previous());
        }
    }

}
