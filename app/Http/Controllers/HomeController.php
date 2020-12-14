<?php

namespace App\Http\Controllers;

use App\Models\future_artists;
use App\Models\videos;
use Illuminate\Http\Request;
use FFMpeg;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    //
    public function Homepage(){$future = new future_artists();
        $artists = $future->GetArtists();
        $videos = new videos();
        $get_videos = $videos->GetAllVideos();
        $upload = DB::select("
        SELECT COUNT(video.id) as count_video, users.id, users.name, users.verify_id, users.avatar_img FROM users, video where users.id = video.id_created group by users.id order by count_video desc limit 4
        ");

        return view('homepage', ["artists" => $artists, "videos" => $get_videos, "uploaders" => $upload]);
    }
    //
    public function test(){
        $ffmpeg = FFMpeg\FFMpeg::create(array(
            'ffmpeg.binaries'  => '/usr/local/bin/ffmpeg',
            'ffprobe.binaries' => '/usr/local/bin/ffprobe',
            'timeout'          => 3600, // The timeout for the underlying process
            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
        ));
        $video = $ffmpeg->open('https://anime47.imfast.io/Orangestar%20-%20%E6%BF%AB%E8%A7%B4%E7%94%9F%E5%91%BD%20%28feat.%20IA%29%20Official%20Video.mp4');
        var_dump($video->getFormat());
        echo gmdate("i:s", 258.020000);

        $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(06));
        mkdir("img/screens/05", 0700);
        $frame->save("img/screens/05/05_screen.jpg");

    }
    public function GetCategories($id){
        $detail = new future_artists();
        $get = $detail->GetArtistDetail($id);
        $video = new videos();
        $data = $video->getVideoArtist($id);
        return view('categories.detail', ["artist" => $get, "videos" => $data]);
    }




}
