<?php

namespace App\Providers;


use App\Models\Church;
use App\Models\FavouritePlacesList;
use App\Models\Hotel;
use App\Models\Hotel_Advantage;
use App\Models\Hotel_Room;
use App\Models\HotelOrder;
use App\Models\Media;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Mosque;
use App\Models\Room_Reservation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {

        // should be edited after dealing white control board
        Route::bind('user',function($model_id){
            $model = User::find($model_id);
            if($model){
                return $model;
            }else{
                return false;
            }
        });

        Route::bind('hotel',function($model_id){
            $model = Hotel::find($model_id);
            if($model){
                return $model;
            }else{
                return false;
            }
        });
        Route::bind('hotel_room',function($model_id){
            $model = Hotel_Room::find($model_id);
            if($model){
                return $model;
            }else{
                return false;
            }
        });
        Route::bind('hotel_advantage',function($model_id){
            $model = Hotel_Advantage::find($model_id);
            if($model){
                return $model;
            }else{
                return false;
            }
        });
        Route::bind('order',function($model_id){
            $model = OrderItem::find($model_id);
            if($model){
                return $model;
            }else{
                return false;
            }
        });
        Route::bind('hotelOrder',function($model_id){
            $model = HotelOrder::find($model_id);
            if($model){
                return $model;
            }else{
                return false;
            }
        });
        Route::bind('room_reservation',function($model_id){
            $model = Room_Reservation::find($model_id);
            if($model){
                return $model;
            }else{
                return false;
            }
        });
        Route::bind('favourite_places_list',function($model_id){
            $model = FavouritePlacesList::find($model_id);
            if($model){
                return $model;
            }else{
                return false;
            }
        });

        Route::bind('mosque',function($model_id){
            $model = Mosque::find($model_id);
            if($model){
                return $model;
            }else{
                return false;
            }
        });
        Route::bind('church',function($model_id){
            $model = Church::find($model_id);
            if($model){
                return $model;
            }else{
                return false;
            }
        });
        Route::bind('media',function($model_id){
            $model = Media::find($model_id);
            if($model){
                return $model;
            }else{
                return false;
            }
        });

        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
