<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsfeedController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\HomeController;

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

Route::get('/registration', [HomeController::class, 'Registration'])->name('home.registration');
Route::post('/registration',[HomeController::class, 'Register']);

Route::get('/login',[HomeController::class, 'Login'])->name('home.login');
Route::post('/login',[HomeController::class, 'ValidateLogin'])->name('home.ValidateLogin');


Route::get('/', [NewsfeedController::class, 'index'])->name('newsfeed.index');
Route::get('/photo', [PhotoController::class, 'index'])->name('photo.index');

Route::group(['middleware'=>['session']], function(){

});