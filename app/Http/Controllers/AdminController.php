<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //
    public function getAllvideos(){
        $data = DB::table("video")->get();
        return view("admin.videos", ["videos" => $data]);
    }
    public function getAllUser(){
        $data = User::all();
        return view("admin.users", ["videos" => $data]);
    }
    public function playlistAll(){
        $data = DB::table("categories_detail")->where("id_categories", 3)->get();
        return view("admin.playlist", ["videos" => $data]);
    }
    public function editVideo($id){
        $data = DB::table("video")->where("id", $id)->get();
        $categories = DB::table("categories")->get();
        return view("admin.video_edit", ["data" => $data, "categories" => $categories]);
    }
    public function edit($id, Request $request){

        var_dump($request->all());
        DB::table("video")
            ->where("id", $id)
            ->update([
                "title" => $request->title,
                    "description" => $request->e2,
                    "cate_id" => $request->cate,
                    "cate_detail_id" => $request->cate_detail,

            ]);
        return redirect()->route("admin_videos");

    }
    public function remove($id){
        DB::table("video")->where("id", $id)->delete();
        return redirect()->route("admin_videos");
    }
    public function deleteAccount($id){
        DB::table("users")->where("id", $id)->delete();
        return redirect()->route("admin_users");
    }
    public function resetPassword($id){
        DB::table("users")->where("id", $id)->update([
           "password" =>  Hash::make("123456")
        ]);
        return redirect()->route("admin_users");

    }
}
