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
}
