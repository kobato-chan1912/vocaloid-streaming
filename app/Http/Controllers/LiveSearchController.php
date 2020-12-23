<?php

namespace App\Http\Controllers;

use App\Models\videos;
use Illuminate\Http\Request;
use App\Models\User;
class LiveSearchController extends Controller
{
    //
    public function index() //show index page.
    {
        return view('search.index');
    }

    public function show($id) //hiển thị ra kết quả tìm kiếm
    {
        $videos = new videos();
        $video = $videos->getVideoDetail($id);



        $data = 'Name: ' . $video[0]->title
          ;


        return $data;
    }

    public function searchByName(Request $request) //chức năng search
    {
        $video = new videos();
        $students = $video->SearchByTitle($request->value);

        return response()->json($students);
    }

    public function searchByEmail(Request $request)
    {
        $students = User::where('email', 'like', '%' . $request->value . '%')->get();

        return response()->json($students);
    }




}
