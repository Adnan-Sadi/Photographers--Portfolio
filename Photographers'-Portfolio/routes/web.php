<?php

use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\NewsfeedController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Profile;

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

Route::get('/registration', [LoginController::class, 'Registration'])->name('auth.registration');
Route::post('/registration',[LoginController::class, 'Register']);

Route::get('/login',[LoginController::class, 'Login'])->name('auth.login');
Route::post('/login',[LoginController::class, 'ValidateLogin'])->name('auth.ValidateLogin');

// Profile routes
Route::get ('/user/{user}', [Profile::class, 'index'])->name('user.index') ;
Route::get('/ user/{user}/edit', 'ProfilesController@edit')->name('user.edit');
Route::patch('/ user/{user}/update', 'ProfilesController@update')->name('user.update');



Route::get('/photo/{photo}', [PhotoController::class, 'index'])->name('photo.index');
Route::post('/photo-upload', [PhotoController::class, 'photoUpload'])->name('photo.photo_upload');
Route::get('/logout',[LoginController::class, 'Logout']);

Route::get('/gallery',[GalleryController::class, 'gallery']);



Route::group(['middleware'=>['session']], function(){
    Route::get('/', [NewsfeedController::class, 'index'])->name('newsfeed.index');
});
