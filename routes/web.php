<?php

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
Route::get('upload', 'UploadController@getUpload');
Route::post('upload', 'UploadController@Upload');

//api
Route::get("get_categories/cate_id={cate_id}", 'HomeController@getCate');
