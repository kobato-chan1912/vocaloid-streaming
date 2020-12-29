<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Illuminate\Support\Facades\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@Homepage')->name("home");

Route::get('test', 'HomeController@test');
Route::get('login', 'AuthController@GetLogin')->name("login");
Route::post('login', 'AuthController@Login');
Route::get('/watch/video={id}', 'VideoController@GetDetail')->name("watch");

Route::get('categories/id={id}', 'HomeController@GetCategories')->name("categories");
Route::get('register', function (){
   return view('Auth.register');
})->name('register');
Route::post('register','AuthController@Register');

Route::get ('logout', 'AuthController@logout')->name('logout');
Route::get('blabla', function (){
//    Storage::disk("google")->put("test.txt", "Hello world");
//    $files = Storage::disk("google")->setVisibility("1pSu7CxXdUL9Ap0pfp84K0RSBtiaCucn4", "public");

    $file = Storage::disk("google")->listContents();
    var_dump($file);
});
Route::get('upload', 'UploadController@getUpload')->middleware('CheckLogin')->name('upload');
Route::post('upload', 'UploadController@Upload')->middleware('CheckLogin');
//api
Route::get("get_categories/cate_id={cate_id}", 'HomeController@getCate');

// Account prefix.
Route::prefix('account')->middleware("CheckLogin")->group(function (){
    Route::get('/videos', 'AccountController@videoManager' )->name('videos_manager');
    Route::get('/avatar', 'AccountController@ChangeProfile')->name('profile_picture');
    Route::post('/avatar', 'AccountController@uploading')->name('profile_update');
    Route::get('/password', 'AccountController@GetChangePassword')->name('change_password');
    Route::post('/password', 'AccountController@ChangePassword');
});

// Filter: Home videos.
Route::get('videos/home/sort={filter}', 'HomeController@Filter')->name('sort_home');


//seaching route.

Route::get('/students', 'LiveSearchController@index');

Route::get('/students/{id}', 'LiveSearchController@show');

Route::get('/search/name', 'LiveSearchController@searchByName');

Route::get('/search/email', 'StudentController@searchByEmail');

Route::get('search/name?value=%QUERY%', function (){

})->name("searching_value");

Route::get("img/screens/{id}/{id2}_screen.jpg", function (){

})->name("screen");

// Playlist Route.

Route::get('playlist/id={id}', 'PlaylistController@getPlaylist');
Route::get('/auth/redirect', 'SocialLoginController@login');
Route::get('/auth/callback', 'SocialLoginController@callback');


// Ajax comment route.
Route::post("comment/add", 'CommentController@getComment');
Route::get("comment/delete/id={id}/video={video_id}", 'CommentController@deleteComment');

//admin
Route::prefix('admin')->middleware("admin")->group(function (){
    Route::get('/videos', 'AdminController@getAllvideos' )->name('admin_videos');
    Route::get('/users', 'AdminController@getAllUser' )->name('admin_users');
    Route::get("/playlist", 'AdminController@playlistAll' )->name('admin_playlist');

    // edit:
    Route::get('/edit/video={id}', 'AdminController@editVideo')->name("admin_edit");
    Route::post('/edit/video={id}', 'AdminController@edit');
    Route::get('/remove/video={id}', 'AdminController@remove')->name("admin_remove");
});

Route::get("/playlist/id={id}", 'PlaylistController@getPlaylist')->name("playlist");
