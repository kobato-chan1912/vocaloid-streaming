<?php

namespace App\Http\Controllers;

use App\Models\videos;
use Illuminate\Http\Request;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Illuminate\Support\Facades\File;
use FFMpeg;
use Carbon\Carbon;

class UploadController extends Controller
{
    public function getUpload(){
        return view('upload');
    }
    public function cdn_get($file_name){
        return "https://anime47.imfast.io/$file_name";
    }
    public function getPreviewDrive($file_name){
        $data = Storage::disk("google")->listContents();
        foreach ($data as $file){
            if ($file["name"] == $file_name){
                return $file["path"];
            }
        }
    }

    public function Upload(Request $request)
    {


        if ($request->hasFile('aksfileupload')) {

            /**
             * Getting new id and user upload.
             *
             * @author Mai Viết Dũng.
             */
            $user_id = $request->session()->get('LoggedUser')["id"];
            $videos = new videos();
            $last_video = $videos->getLast()->id;

            $new_id = $last_video + 1;
            $new_format_id = sprintf("%02d", $new_id);


            /**
             * Uploading to server.
             *
             * @author Mai Viết Dũng.
             */

            $file = $request->aksfileupload[0];
            $original_file = $file->getClientOriginalName()."_$new_format_id"."_$user_id";
            $file_edit_name = str_replace(" ", "_", $original_file)."_$new_format_id"."_$user_id";
            $url = asset("temp_video").'/'.$file_edit_name;
            $file->move('temp_video', $file_edit_name);

            /**
             * Push vias Google Drive.
             *
             * @author Mai Viết Dũng.
             */

            $content = file_get_contents(asset($url));
            Storage::disk("google")->put($original_file, $content);



            /**
             * Get data to be inserted.
             *
             * @author
             */


            // Get the cdn.
            $cdn_url = $this->cdn_get($original_file);

            //getting preview and duration.
            $ffmpeg = FFMpeg\FFMpeg::create(array( //config ffmpeg
                'ffmpeg.binaries'  => '/usr/local/bin/ffmpeg',
                'ffprobe.binaries' => '/usr/local/bin/ffprobe',
                'timeout'          => 3600, // The timeout for the underlying process
                'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
            ));
            $ffprobe = FFMpeg\FFProbe::create(array(
                'ffmpeg.binaries'  => '/usr/local/bin/ffmpeg',
                'ffprobe.binaries' => '/usr/local/bin/ffprobe',
                'timeout'          => 3600, // The timeout for the underlying process
                'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
            ));

            $get = $ffprobe->format($cdn_url)->get('duration',100);
            $duration = gmdate("i:s", $get); // get the duration.

            //get the preview.
            $video = $ffmpeg->open(asset($url));
            $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(06));
            $preview_file = $new_format_id."_screen.jpg"; //get the preview file name
            mkdir("img/screens/$new_format_id", 0700);
            $frame->save("img/screens/$new_format_id/$new_format_id"."_screen.jpg");

            //get the upload date.
            $time = Carbon::now();

            // get drive url.
            $drive_url = $this->getPreviewDrive($original_file);

            /**
             * Inserting to the database.
             *
             * @author
             */

            $insert = $videos->insert_video($preview_file, $cdn_url, $request->cate, $request->cate_detail, $user_id
            , $request->title, 0, $original_file, $new_format_id, $duration, $request->e2, $time, $drive_url

            );



            /**
             * Empty the temp file.
             *
             * @author
             */


            File::delete("temp_video/$file_edit_name");
            return redirect()->route('home')->with(["success" => "Your video has been uploaded. Please wait for the system to process."]);

        }

        else {
            echo "No file loaded";
        }
    }
}
