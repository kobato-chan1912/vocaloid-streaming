<?php

namespace App\Http\Controllers;

use App\Models\videos;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
    public function uploading(Request $request){


        if ($request->hasFile('aksfileupload')){

            $validate = ["png", "jpg", "jpeg"];

            $file = $request->aksfileupload[0];
            $extension = $file->getClientOriginalExtension();
            if (in_array($extension, $validate)) {
                $file_name = $request->session()->get('LoggedUser')["id"].".$extension";
                $file->move("img/avatar", $file_name);
                User::where('id', $request->session()->get('LoggedUser')["id"])
                    ->update(['avatar_img' => "img/avatar/$file_name"]);
                $request->session()->get('LoggedUser')["avatar_img"] = "img/avatar/$file_name"; //change current session.
                return view("account.profile", ["message" => "Profile picture has been changed successfully!"]);
            }

            else {
                return view('account.profile', ["message" => "Only supports *png, *jpg, *jpeg"]);
            }




        }
        else{
            return view('account.profile', ["message" => "No file loaded."]);
        }
    }
    public function GetChangePassword(){
        return view('account.change_password');
    }
    public function ChangePassword(Request $request){
        if ($request->display_name == $request->session()->get("LoggedUser")["name"]) {
            $request->validate([
                "display_name" => 'required',
                "old_password" => 'required',
                'new_password' => 'required',
                'renew_password' => 'required'
            ]);
        }
        else {
            $request->validate([
                "display_name" => 'required|unique:users,name',
                "old_password" => 'required',
                'new_password' => 'required',
                'renew_password' => 'required'
            ]);
        }
        $user = User::where('id', '=', $request->session()->get("LoggedUser")["id"])->first();

        if (Hash::check($request->old_password, $user->password)){
                if ($request->new_password == $request->renew_password){
                    User::where("id", $request->session()->get("LoggedUser")["id"])
                        ->update([
                            "name" => $request->display_name,
                            "password" => Hash::make($request->new_password)
                        ]);
                    return view("account.change_password", ["alert"=>"Profile has been updated!"]);

                }
                else {
                    return view("account.change_password", ["alert"=>"The retype password doesn't match."]);

                }
        }
        else {
            return view("account.change_password", ["alert"=>"The current password is wrong."]);
        }

    }
}
