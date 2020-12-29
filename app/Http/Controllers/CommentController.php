<?php

namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{
    //
    public function getComment(Request $request){
        $id_auth = ($request->session()->get("LoggedUser")["id"]);
        $comment = new comments();
        $comment->InsertComment($request->id_video, $request->comment, $id_auth);
        $update = $comment->getCommentsDetail($request->id_video);
        return view("ajax.comment", ["comments" => $update]);
    }
    public function deleteComment($id, $video_id, Request $request){
        // validate ajax request.

        $comment = new comments();
        $get = $comment->getComment($id);
        if ($get[0]->id_created == $request->session()->get("LoggedUser")["id"]) {


            // solve ajax form
            $comment = new comments();
            $comment->drop($id);
            $update = $comment->getCommentsDetail($video_id);
            return view("ajax.comment", ["comments" => $update]);
        }
        else {
            abort('403');
        }
    }
}
