<?php

namespace App\Http\Controllers;

use App\Models\future_artists;
use App\Models\videos;
use Illuminate\Http\Request;
use FFMpeg;
class HomeController extends Controller
{
    //
    public function Homepage(){
        $future = new future_artists();
        $artists = $future->GetArtists();
        $videos = new videos();
        $get_videos = $videos->GetAllVideos();
        return view('homepage', ["artists" => $artists, "videos" => $get_videos]);
    }
    //
    public function test(){
        $ffmpeg = FFMpeg\FFMpeg::create(array(
            'ffmpeg.binaries'  => '/usr/local/bin/ffmpeg',
            'ffprobe.binaries' => '/usr/local/bin/ffprobe',
            'timeout'          => 3600, // The timeout for the underlying process
            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
        ));
        $video = $ffmpeg->open('https://anime47.imfast.io/%5BDoremi-FS%5D%20glow%20-%20Keeno%20%28Magical%20Mirai%202015%29.mp4');
        var_dump($video->getFormat());
        echo gmdate("i:s", 258.020000);

        $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(06));
        mkdir("img/screens/02", 0700);
        $frame->save("img/screens/02/02_screen.jpg");

    }
    public function GetCategories($id){
        $detail = new future_artists();
        $get = $detail->GetArtistDetail($id);
        $video = new videos();
        $data = $video->getVideoArtist($id);
        return view('categories.detail', ["artist" => $get, "videos" => $data]);
    }
}
