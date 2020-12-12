<?php

namespace App\Http\Controllers;

use App\Models\videos;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function GetDetail($id){
        $video = new videos();
        $get = $video->getVideoDetail($id);
        return view("video-page", ["data" => $get]);
    }
}
