<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsfeedController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BlogpostController;



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

Route::get('/photo/{photo}', [PhotoController::class, 'index'])->name('photo.index');
Route::post('/photo-upload', [PhotoController::class, 'photoUpload'])->name('photo.photo_upload');
Route::get('/photo-upload-page', [PhotoController::class, 'photoUploadPage'])->name('photo.photo_upload_page');
Route::get('/logout',[LoginController::class, 'Logout']);

Route::get('/gallery',[GalleryController::class, 'gallery']);

Route::get('/blogpost',[BlogpostController::class, 'blogpost']);
Route::post('/blogpost',[BlogpostController::class, 'blogpost']);


Route::group(['middleware'=>['session']], function(){
    Route::get('/', [NewsfeedController::class, 'index'])->name('newsfeed.index');
    Route::get('/test-follow/{user}', [FollowController::class, 'index'])->name('follow.index');
    Route::get('/follow/{user}', [FollowController::class, 'followUser'])->name('follow.follow_user');
    Route::get('/unfollow/{user}', [FollowController::class, 'unfollowUser'])->name('follow.unfollow_user');
    Route::get('/follower-page/{user}', [FollowController::class, 'followerPage'])->name('follow.follower_page');
});