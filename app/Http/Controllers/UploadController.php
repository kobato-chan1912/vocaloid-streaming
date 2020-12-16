<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    //

    public function testUpload(Request $request){
        var_dump($request->all());
    }

    public function Upload(Request $request)
    {

        if ($request->hasFile('aksfileupload')) {
            echo "Có";

            /**
             * Uploading to server.
             *
             * @author Mai Viết Dũng.
             */

            $file = $request->aksfileupload[0];
            $original_file = $file->getClientOriginalName();
            $file_edit_name = str_replace(" ", "_", $original_file);
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
             * Empty the temp file.
             *
             * @author
             */
            File::delete("temp_video/$file_edit_name");



        }
    }
}
