<?php

namespace App\Http\Controllers;

use App\Models\future_artists;
use Illuminate\Http\Request;
use FFMpeg;
class HomeController extends Controller
{
    //
    public function Homepage(){
        $future = new future_artists();
        $artists = $future->GetArtists();
        return view('homepage', ["artists" => $artists]);
    }
    //
    public function test(){
        $ffmpeg = FFMpeg\FFMpeg::create(array(
            'ffmpeg.binaries'  => '/usr/local/bin/ffmpeg',
            'ffprobe.binaries' => '/usr/local/bin/ffprobe',
            'timeout'          => 3600, // The timeout for the underlying process
            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
        ));
        $video = $ffmpeg->open('https://anime47.imfast.io/%5BVnsharing%5DS-G.mp4');
        var_dump($video->getFormat());
        echo gmdate("i:s", 258.020000);

        //        $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(42));
//        $frame->save("img/screen.jpg");

    }
}
