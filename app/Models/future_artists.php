<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class future_artists extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "main_artist";
    public function GetArtists(){
        return DB::table($this->table)
            ->select("*")
            ->get();
    }
    public function GetArtistDetail($id){
        return DB::table($this->table)
            ->select("*")
            ->where("id_detail", $id)
            ->get();
    }

}
