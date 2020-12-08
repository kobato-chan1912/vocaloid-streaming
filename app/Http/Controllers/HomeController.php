<?php

namespace App\Http\Controllers;

use App\Models\future_artists;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function Homepage(){
        $future = new future_artists();
        $artists = $future->GetArtists();
        return view('homepage', ["artists" => $artists]);
    }
}
