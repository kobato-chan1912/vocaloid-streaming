<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class categories_detail extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "categories_detail";
    public function GetCategoriesDetail(){
        return DB::table($this->table)
            ->select("*")
            ->get();
    }
    public function getDetail($cate_id){
        return DB::table($this->table)
            ->select("*")
            ->where("id_categories", $cate_id)
            ->get();
    }


}
