<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Hotel_Rooms\newHotel_RoomRequest;
use App\Http\Requests\Api\Hotel_Rooms\updateHotel_RoomRequest;
use App\Http\Resources\Hotel_RoomResource;
use App\Models\Hotel_Room;
use Illuminate\Http\Request;

class Hotel_RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Hotel_RoomResource::collection(Hotel_Room::all()) );

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
    public function store(newHotel_RoomRequest $request)
    {
        $hotel_Room = Hotel_Room::create($request->validated());
 

        if($request->file){
            foreach ($request->file as $file) {
                $file = $request->file->store('public', 'public');
                $hotel_Room->media()->create(['name' => $file]);
            }
        }
        return response()->json(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel_Room  $hotel_Room
     * @return \Illuminate\Http\Response
     */
    public function show($hotel_Room)
    {
        if($hotel_Room) {
            return response()->json(['message'=>'success' , 'data'=> Hotel_RoomResource::make($hotel_Room)]);
        }else{
            return response()->json(['message' => 'this hotel room does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel_Room  $hotel_Room
     * @return \Illuminate\Http\Response
     */
    public function edit($hotel_Room)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel_Room  $hotel_Room
     * @return \Illuminate\Http\Response
     */
    public function update(updateHotel_RoomRequest $request, $hotel_Room)
    {
        if($hotel_Room) {
            $hotel_Room->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=> Hotel_RoomResource::make($hotel_Room)]);
        }else{
            return response()->json(['message' => 'this hotel room does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel_Room  $hotel_Room
     * @return \Illuminate\Http\Response
     */
    public function destroy( $hotel_Room)
    {
        if($hotel_Room) {
            $hotel_Room->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this hotel room does not exist']);
        }
    }

//    public function resevationsForAllRooms()
//    {
//      // $topReserved = Hotel_Room::with(hotel_Room->room_hotel_name)
//        $topReserved = Hotel_RoomResource::collection()
//            ->orderByRaw('(SELECT sum(room_count) FROM room_reservations
//            WHERE room_reservations.hotel_room_id = hotel_room_id DESC )')->get();
//        return response()->json(['message'=>'success', 'Top Reserved'=> $topReserved]);
//
////        $hotelRoomsFiltered = hotel_room->filter(function($hotel_room){
////            return $hotel_room->room_reservations->min('room_count') >= 3 ;
////        });
//    }
}
