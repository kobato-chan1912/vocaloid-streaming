<?php

namespace App\Http\Controllers;

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
        $student = User::findOrFail($id);

        $data = 'Name: ' . $student->name
            . '<br/>Email: ' . $student->email;


        return $data;
    }

    public function searchByName(Request $request) //chức năng search
    {
        $students = User::where('name', 'like', '%' . $request->value . '%')->get();

        return response()->json($students);
    }

    public function searchByEmail(Request $request)
    {
        $students = User::where('email', 'like', '%' . $request->value . '%')->get();

        return response()->json($students);
    }




}
