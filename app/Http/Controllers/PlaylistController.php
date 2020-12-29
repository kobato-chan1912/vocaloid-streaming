<?php

namespace App\Http\Controllers;

use App\Models\categories_detail;
use App\Models\videos;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    //
    public function getPlaylist($id){
        $new = new videos();
        $videos = $new->getPlaylist($id);
        if (count($videos)==0){
            echo "Playlist not found any data";
        }
        else {
            $i = 1;
            foreach ($videos as $value) {
                $arr[$i] = $value;
                $i++;
            }
            $videos = $arr;

            return view("playlist.playlist", ["videos" => $videos, "count" => count($videos)]);
        }

    }
}
