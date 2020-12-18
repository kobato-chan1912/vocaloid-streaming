<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class videos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "video";
    public function GetAllVideos(){
        return DB::table($this->table)
            ->select("video.*", "users.name", "users.verify_id")
            ->join('users', 'users.id', '=', 'video.id_created')

            ->get();
    }
    public function getVideoDetail($id){
        return DB::table($this->table)
            ->select("video.*", "users.name", "users.verify_id" , "users.avatar_img", "categories_detail.cate_detail_name")

            ->join('categories_detail', 'categories_detail.id', '=', 'video.cate_detail_id')
            ->join('users', 'users.id', '=', 'video.id_created')

            ->where("video.id", $id)
            ->get();
    }
    public function getVideoArtist($id_artist){
        return DB::table($this->table)
            ->select("video.*", "users.name", "users.verify_id")
            ->join("users", "users.id", "=", "video.id_created")
            ->where("cate_detail_id", $id_artist)
            ->get();
    }
    public function GetID_Detail($id_video){
        return DB::table($this->table)
            ->select("cate_detail_id")
            ->where("id", $id_video)
            ->get();
    }
    public function GetViewers($id){
        return DB::table($this->table)
            ->select("viewers")
            ->where("id", $id)
            ->get();
    }


    public function theSameArtist($id_cate, $id_video){
        return DB::table($this->table)
            ->select("video.*", "users.name" , "users.verify_id")
            ->join("users", "users.id", "=", "video.id_created")
            ->where("cate_detail_id", $id_cate)
            ->where("video.id", "!=", $id_video)
            ->limit(7)
            ->get();
    }
    public function UpdateViewers($id, $count){
        DB::table($this->table)
            ->where("id", $id)
            ->update([
               "viewers" => $count
            ]);

    }
    public function getLast(){
        return DB::table($this->table)->latest("id")->first();
    }

    public function insert_video ($preview_url, $drive_url, $cdn_url, $cate_id, $cate_detail_id, $id_created, $title, $viewers, $file_name, $duration, $id_format , $description, $upload_date){
        DB::table($this->table)
            ->insert([
               ["preview_url" => $preview_url,
                   "cdn_url" => $cdn_url,
                   "cate_id" => $cate_id,
                   "cate_detail_id" => $cate_detail_id,
                   "id_created" => $id_created,
                   "title" => $title,
                   "viewers" => $viewers,
                   "file_name" => $file_name,
                   "id_format" => $id_format,
                   "duration" => $duration,
                   "description" => $description,
                   "upload_date" => $upload_date,
                   "drive_url" => $drive_url]
            ]);

    }
}
