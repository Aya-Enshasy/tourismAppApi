<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Hotels\newHotelRequest;
use App\Http\Requests\Api\Hotels\updateHotelRequest;
use App\Http\Resources\HotelResource;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( HotelResource::collection(Hotel::all()));

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
    public function store(newHotelRequest $request)
    {
        $hotel = Hotel::create($request->validated());
        if($request->file){
            $file = $request->file->store('public','public');
            $hotel->media()->create(['name'=>$file]);
        }
        return response()->json(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */

    public function show($hotel){
        if($hotel) {
            return response()->json(['message'=>'success' , 'data'=> HotelResource::make($hotel)]);
        }else{
            return response()->json(['message' => 'this hotel does not exist']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */

    public function edit($hotel){
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(updateHotelRequest $request,$hotel)
    {
        if($hotel) {
            if($request->file) {
                $file = $request->file->store('public','public');
                if($hotel->media){
                    $hotel->media->update(['name'=>$file]);
                }else{
                    $hotel->media()->create(['name'=>$file]);
                }
            }
            $hotel->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=> HotelResource::make($hotel)]);
        }else{
            return response()->json(['message' => 'this hotel does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */

    public function destroy($hotel)
    {
        if($hotel) {
            $hotel->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this hotel does not exist']);
        }
    }


//    public  function  search(){
////        $txtSearch = request('searchKey');
////        $hotels = Hotel::query()
//            ->where('name','Like',"%{$txtSearch}%")
//            ->orwhere('details','LIKE',"%{$txtSearch}%")->get();
//        return response()->json([
//            'message'=>'success',
//            'hotels'=>$hotels]);
//    }

    public function topHotels(){
        return Hotel::where('star', '>=' , 5)->get();
    }

    public function hotelsHasRooms(){
        return Hotel::whereHas('rooms')->get();
    }

    public function hotelsHasRoomsWithOffer(){
        return Hotel::with('rooms')->whereHas('rooms', function ($q) {
            $q->whereNotNull('has_offer');
        })->get();
    }

    public function hotelsHasNoRooms(){
        return Hotel::doesntHave('rooms')->get();
    }


}
