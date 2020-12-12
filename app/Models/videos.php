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
            ->select("*")
            ->get();
    }
    public function getVideoDetail($id){
        return DB::table($this->table)
            ->select("*")
            ->join('categories_detail', 'categories_detail.id', '=', 'video.cate_detail_id')
            ->join('users', 'users.id', '=', 'video.id_created')

            ->where("video.id", $id)
            ->get();
    }
}
