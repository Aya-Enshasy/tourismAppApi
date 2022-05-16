<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Hotel_Advantages\newHotel_AdvantageRequest;
use App\Http\Requests\Api\Hotel_Advantages\updateHotel_AdvantageRequest;
use App\Http\Resources\Hotel_AdvantageResource;
use App\Models\Hotel_Advantage;
use Illuminate\Http\Request;

class Hotel_AdvantagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return response()->json( Hotel_AdvantageResource::collection(Hotel_Advantage::all()) );

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
    public function store(newHotel_AdvantageRequest $request)
    {
        Hotel_Advantage::create($request->validated());
        return response()->json(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel_Advantage  $hotel_Advantage
     * @return \Illuminate\Http\Response
     */
    public function show( $hotel_Advantage)
    {
        if($hotel_Advantage) {
            return response()->json(['message'=>'success' , 'data'=>  Hotel_AdvantageResource::make($hotel_Advantage)]);
        }else{
            return response()->json(['message' => 'this hotel advantage does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel_Advantage  $hotel_Advantage
     * @return \Illuminate\Http\Response
     */
    public function edit( $hotel_Advantage)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel_Advantage  $hotel_Advantage
     * @return \Illuminate\Http\Response
     */
    public function update(updateHotel_AdvantageRequest $request, $hotel_Advantage)
    {
        if($hotel_Advantage) {
            $hotel_Advantage->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=>  Hotel_AdvantageResource::make($hotel_Advantage)]);
        }else{
            return response()->json(['message' => 'this hotel advantage does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel_Advantage  $hotel_Advantage
     * @return \Illuminate\Http\Response
     */
    public function destroy( $hotel_Advantage)
    {
        if($hotel_Advantage) {
            $hotel_Advantage->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this hotel advantage does not exist']);
        }
    }
}
