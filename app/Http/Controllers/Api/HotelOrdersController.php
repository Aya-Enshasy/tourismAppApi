<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\HotelOrders\newHotelOrderRequest;
use App\Http\Requests\Api\HotelOrders\updateHotelOrderRequest;
use App\Http\Resources\HotelOrderResource;
use App\Models\HotelOrder;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\u;

class HotelOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotelOrder = HotelOrder::all();
//        return response()->json($hotelOrder);
        return response()->json( HotelOrderResource::collection($hotelOrder));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(newHotelOrderRequest $request)
    {
        $hotelOrder = HotelOrder::create($request->validated());
        return response()->json(['message' => 'success', 'data' => HotelOrderResource::make($hotelOrder)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HotelOrder  $hotelOrder
     * @return \Illuminate\Http\Response
     */
    public function show($hotelOrder)
    {
        if ($hotelOrder) {
            return response()->json(['message' => 'success', 'data' => HotelOrderResource::make($hotelOrder)]);
        } else {
            return response()->json(['message' => 'this hotel order does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelOrder  $hotelOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($hotelOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelOrder  $hotelOrder
     * @return \Illuminate\Http\Response
     */
    public function update(updateHotelOrderRequest $request,$hotelOrder)
    {
        if ($hotelOrder) {
            $hotelOrder->update($request->validated());
            return response()->json(['message' => 'success', 'data' => HotelOrderResource::make($hotelOrder)]);
        } else {
            return response()->json(['message' => 'this hotel order does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelOrder  $hotelOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($hotelOrder)
    {
        if ($hotelOrder) {
            $hotelOrder->delete();
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'this hotel order does not exist']);
        }
    }

    public function deleteAllAuthHotelOrders()
    {
        $order = HotelOrder::where('user_id', auth()->user()->id)->where('status',1)->first();
        if ($order) {
            HotelOrder::where('user_id', auth()->user()->id)->where('status',1)->delete();
            OrderItem::where('order_id', $order->id)->delete();
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(
                ['message' => 'user does not have any reservations yet ', 'errors' => 1]
            );
        }
    }



    public function deleteAllUserHotelOrders($user)
    {
        $user = User::find($user);
        if ($user) {
            $order = HotelOrder::where('user_id', auth()->user()->id)->where('status',1)->first();
            if ($order) {
                HotelOrder::where('user_id', auth()->user()->id)->where('status',1)->delete();
                OrderItem::where('order_id', $order->id)->delete();
                return response()->json(['message' => 'success']);
            } else {
                return response()->json(
                    ['message' => 'user does not have any reservations yet ', 'errors' => 1]
                );
            }
        } else {
            return response()->json(['message' => 'this user does not exist']);
        }
    }


    public function getAuthHotelOrders(){

//        $order = Auth::user()->paid_hotel_order;
        $order = HotelOrder::where('user_id', auth()->user()->id)->where('status',1)->get();

         if ($order) {
            return response()->json(['message' => 'success', 'data' => HotelOrderResource::collection($order)]);
        }else{
            return response()->json(
                ['message' => 'user does not have any reservation orders yet ', 'errors' => 1]
            );
        }
    }

    public function getUserHotelOrders($user){

        $user = User::find($user);
        if($user) {
            $order = HotelOrder::where('user_id', $user->id)->where('status',1)->get();

            if ($order) {
                return response()->json(['message' => 'success', 'data' => HotelOrderResource::collection($order)]);
            }else{
                return response()->json(
                    ['message' => 'user does not have any reservation orders yet ', 'errors' => 1]
                );
            }
        }else{
            return response()->json(['message' => 'this user does not exist']);
        }
    }



}
