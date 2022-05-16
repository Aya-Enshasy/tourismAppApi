<?php


use App\Http\Controllers\Control_Panel\AuthController;
use App\Http\Controllers\Control_Panel\ChurchesController;
use App\Http\Controllers\Control_Panel\Hotel_AdvantagesController;
use App\Http\Controllers\Control_Panel\Hotel_RoomsController;
use App\Http\Controllers\Control_Panel\HotelsController;
use App\Http\Controllers\Control_Panel\MediaController;
use App\Http\Controllers\Control_Panel\MosquesController;
use App\Http\Controllers\Control_Panel\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::resource('hotels', HotelsController::class);
Route::resource('mosques', MosquesController::class);
Route::resource('churches', ChurchesController::class);
Route::resource('media', MediaController::class);
Route::resource('hotel_advantages', Hotel_AdvantagesController::class);
Route::resource('hotel_rooms', Hotel_RoomsController::class);

// login admin
Route::get('/login',[AuthController::class,'login']); // get view
Route::post('/login',[AuthController::class, 'store']); // get signInAdmin method
Route::get('/logout',[AuthController::class, 'logout']); // get logoutAdmin method
