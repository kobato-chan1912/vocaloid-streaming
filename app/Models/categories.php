<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class categories extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "categories";
    public function GetCategories(){
        return DB::table($this->table)
            ->select("*")
            ->get();
    }
}
