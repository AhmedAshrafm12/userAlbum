<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\picturesController;
use App\Http\Controllers\userController;
use GuzzleHttp\Middleware;
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

//registration routes


Route::post('register',[userController::class,'store']);
Route::post('login',[userController::class,'login']);




// Authenticate routes

Route::group(['middleware' => 'auth'], function () {
    // user Routes
    Route::get('logout',[userController::class,'logout']);   
    Route::get('/home',[AlbumController::class , 'index']);   
 
  // albums routes
    Route::resource('albums' , AlbumController::class);
    Route::get('deleteAll/{album}' , [AlbumController::class,'deleteAll']);
    Route::get('albumsList/' , [AlbumController::class,'albumsList']);

   // pictures routes
    Route::get('movePictures/{sourceAlbumId}/{targetAlbumId}' , [AlbumController::class,'movePictures']);
    Route::get('addPicture/{album}',[picturesController::class ,'addPicture']);
    Route::post('p/{album}',[picturesController::class ,'store']);
});




Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () { return view('index'); });
Route::get('/register',function(){return view('register');});
 
  
});