<?php

namespace App\Http\Controllers;

use App\Models\videos;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //


    //
    public function GetDetail($id){
        $video = new videos();
        $count = $video->GetViewers($id)[0]->viewers;
        $count++;
        $video->UpdateViewers($id, $count);
        $cate_id = $video->GetID_Detail($id)[0]->cate_detail_id;
        $the_same = $video->theSameArtist($cate_id, $id);
        $get = $video->getVideoDetail($id);
        return view("video-page", ["data" => $get, "up_next" => $the_same]);
    }
}
