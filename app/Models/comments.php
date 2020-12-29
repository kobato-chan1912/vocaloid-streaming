<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class comments extends Model
{
    use HasFactory;
    protected $table = "comments";
    public function getCommentsDetail($id_video){
        return DB::table($this->table)
            ->select("comments.*", "users.name", "users.verify_id", "users.avatar_img")
            ->join("users", "users.id", "=", "comments.id_created")
            ->where("id_video", $id_video)
            ->orderBy("time_created", "DESC")
            ->get();
    }
    public function InsertComment($id_video, $comment, $id_created){
        DB::table($this->table)->insert([
           "comments" => $comment,
            "id_video" => $id_video,
            "id_created" => $id_created,
            "time_created" => Carbon::now()
        ]);
    }
    public function getComment($id_comment){
        return DB::table($this->table)
            ->select("*")
            ->where("id", $id_comment)
            ->get();
    }
    public function drop($id){
        DB::table($this->table)->where("id",'=', $id)->delete();
    }
}
