<?php

use Illuminate\Support\Facades\Route;

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
