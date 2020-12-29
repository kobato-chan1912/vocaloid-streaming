<?php

namespace App\Http\Controllers;

use App\Models\comments;
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
        $comment = new comments();
        $comment_data = $comment->getCommentsDetail($id);
        return view("video-page", ["data" => $get, "up_next" => $the_same, "comments" => $comment_data, "video_id" => $id]);
    }


    /*
     * [
     *  "id" => 1,
     *  "preview_url" => "01_screen.jpg",
     *  "drive_url" => "127c6xM4QxrbKjrFv2lhRx5vNDRURzXiZ",
     *  "cdn_url" => "https://anime47.imfast.io/【MAD】 Though my song has no shape.MP4"
     *  "cate_id" => 2,
     *  "cate_detail_id" => 2,
     *  "id_created" => 1,
     *  "title" => "[MAD/Utaite] Through My Song Has No Shape - Hanatan",
     *  "viewers" => 10,
     *  "file_name" => 【MAD】 Though my song has no shape.MP4,
     *  "duration" => "04:18",
     *  "id_format" => 03,
     *  "description" => "a love song doriko",
     *  "upload_date" => "2020-12-12 12:45:56"
     * ]
     *
     *
     * */

}
