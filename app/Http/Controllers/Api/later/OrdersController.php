<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Orders\newOrderRequest;
use App\Http\Requests\Api\Orders\updateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $orders = Order::select('id', 'user_id', 'status', 'is_paid', 'total_price', 'created_at')->get();
        return response()->json(
            ['message' => 'success',
                'data' => ['orders' => $orders]
            ]);
//        return response()->json($hotels);
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

    public function store(newOrderRequest $request)
    {
        Order::create($request->validated());
        return response()->json(['message'=>'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show( $order)
    {
        if($order) {
            return response()->json(['message'=>'success' , 'data'=> $order]);
        }else{
            return response()->json(['message' => 'this order does not exist']);
        }
    }

//    public  function showUserOrders(){
//        $userId = Auth::id();
//        $orders = Order::where('user_id',$userId)->get(); // filtering posts table
//        return response()->json($orders);
//    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit( $order)
    {
        if($order) {
            return response()->json(['message'=>'success' , 'data'=> $order]);
        }else{
            return response()->json(['message' => 'this order does not exist']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(updateOrderRequest $request, $order)
    {
        if($order) {
            $order->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=> $order]);
        }else{
            return response()->json(['message' => 'this order does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy( $order)
    {
        if($order) {
            $order->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this order does not exist']);
        }
    }
}
