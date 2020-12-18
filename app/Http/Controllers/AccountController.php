<?php

namespace App\Http\Controllers;

use App\Models\videos;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function videoManager(Request $request){
        $id = $request->session()->get("LoggedUser")["id"];
        $videos = new videos();
        $get_all = $videos->getVideoUser($id);
        return view('account.videos_list', ["videos" => $get_all]);
    }
    public function ChangeProfile(){
        return view('account.profile');
    }
}
