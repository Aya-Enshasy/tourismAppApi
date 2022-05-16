<?php

use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmailVerificationController;
use App\Http\Controllers\Api\NewPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('updateAuthAvatar', [AuthController::class, 'updateAuthAvatar']);

    Route::resource('users', \App\Http\Controllers\Api\UserController::class);
    Route::resource('media', \App\Http\Controllers\Api\MediaController::class);
    Route::resource('hotels', \App\Http\Controllers\Api\HotelsController::class);
    Route::resource('hotel_advantages', \App\Http\Controllers\Api\Hotel_AdvantagesController::class);
    Route::resource('hotel_rooms', \App\Http\Controllers\Api\Hotel_RoomsController::class);
    Route::resource('mosques', \App\Http\Controllers\Api\MosquesController::class);
    Route::resource('churches', \App\Http\Controllers\Api\ChurchesController::class);
    Route::resource('favouritePlacesLists', \App\Http\Controllers\Api\FavouritePlacesListController::class);

    Route::post('buyOneOrderItem', [\App\Http\Controllers\Api\OrdersController::class, 'buyOneOrderItem']);
    Route::post('addNewOrderItem', [\App\Http\Controllers\Api\OrdersController::class, 'addNewOrderItem']);
    Route::delete('deleteAuthReservations', [\App\Http\Controllers\Api\OrdersController::class, 'deleteAuthReservations']);
    Route::delete('deleteUserReservations/{id}', [\App\Http\Controllers\Api\OrdersController::class, 'deleteUserReservations']);

    Route::get('getAuthOrderItems', [\App\Http\Controllers\Api\OrdersController::class, 'getAuthOrderItems']);
    Route::get('getUserOrderItems/{id}', [\App\Http\Controllers\Api\OrdersController::class, 'getUserOrderItems']);
    Route::post('buyAllAuthOrderItems', [\App\Http\Controllers\Api\OrdersController::class, 'buyAllAuthOrderItems']);

    Route::get('getAuthHotelOrders', [\App\Http\Controllers\Api\HotelOrdersController::class, 'getAuthHotelOrders']);
    Route::get('getUserHotelOrders/{id}', [\App\Http\Controllers\Api\HotelOrdersController::class, 'getUserHotelOrders']);

    Route::delete('deleteAllAuthHotelOrders', [\App\Http\Controllers\Api\HotelOrdersController::class, 'deleteAllAuthHotelOrders']);
    Route::delete('deleteAllUserHotelOrders/{id}', [\App\Http\Controllers\Api\HotelOrdersController::class, 'deleteAllUserHotelOrders']);

    //--------------------------------------------------------------------------------
    Route::get('buyAllAuthOrderItems' , function ($token){ auth()->user()->update(['fcm_token',$token]); });


    Route::resource('orders', \App\Http\Controllers\Api\OrdersController::class);
    Route::resource('hotelOrders', \App\Http\Controllers\Api\HotelOrdersController::class);

//    Route::resource('room_reservations', \App\Http\Controllers\Api\Room_ReservationsController::class);
//    Route::get('authUserReservations', [\App\Http\Controllers\Api\Room_ReservationsController::class , 'authUserReservations']);
//    Route::get('UserReservations/{id}', [\App\Http\Controllers\Api\Room_ReservationsController::class , 'UserReservations']);
//    Route::delete('deleteAuthUserReservedRoom/{id}', [\App\Http\Controllers\Api\Room_ReservationsController::class , 'deleteAuthUserReservedRoom']);
//    Route::put('updateAuthUserReservedRoom/{id}', [\App\Http\Controllers\Api\Room_ReservationsController::class , 'updateAuthUserReservedRoom']);
//    Route::resource('categories', \App\Http\Controllers\Api\CategoriesController::class);
//    Route::resource('orders', \App\Http\Controllers\Api\OrdersController::class);
//    Route::resource('order_details', \App\Http\Controllers\Api\Order_DetailsController::class);
//    Route::resource('favourite_lists', \App\Http\Controllers\Api\Favourite_ListsController::class);
//    Route::resource('restaurants', \App\Http\Controllers\Api\RestuarantsController::class);
//    Route::resource('restaurant_categories', \App\Http\Controllers\Api\Restuarant_CategoriesController::class);
//    Route::resource('restaurant_dishes', \App\Http\Controllers\Api\Restuarant_DishesController::class);

});
