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
        $video = $ffmpeg->open('https://anime47.imfast.io/Orangestar%20-%20%E3%82%B7%E3%83%B3%E3%82%AF%E3%83%AD%E3%83%8A%E3%82%A4%E3%82%B5%E3%82%99%E3%83%BC%20(feat.%20%E5%88%9D%E9%9F%B3%E3%83%9F%E3%82%AF)%20Official%20Video.mp4');
        var_dump($video->getFormat());
        echo gmdate("i:s", 258.020000);

        $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(06));
        mkdir("img/screens/04", 0700);
        $frame->save("img/screens/04/04_screen.jpg");

    }
    public function GetCategories($id){
        $detail = new future_artists();
        $get = $detail->GetArtistDetail($id);
        $video = new videos();
        $data = $video->getVideoArtist($id);
        return view('categories.detail', ["artist" => $get, "videos" => $data]);
    }
}
