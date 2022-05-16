<?php

namespace App\Http\Controllers\Control_Panel;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Hotel_Rooms\newHotel_RoomRequest;
use App\Http\Requests\Api\Hotel_Rooms\updateHotel_RoomRequest;
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
//        $hotel_rooms = Hotel_Room::paginate(10);
        $hotel_rooms = Hotel_Room::all();
        return view('control_panel.hotel_rooms.index',compact('hotel_rooms'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_panel.hotel_rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(newHotel_RoomRequest $request)
    {
        $hotel_room = hotel_room::create($request->validated());
        if ($request->hasFile('files')) {
            $image_name = $request->file->store('public', 'public');
            $hotel_room->media()->create(['name' => $image_name]);
        }
        return redirect(route('hotel_rooms.index'));
//        redirect(route('hotel_rooms.index')->with('success','You added a hotel_room successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel_Room  $hotel_room
     * @return \Illuminate\Http\Response
     */

    public function show($hotel_room){
//        if($hotel_room) {
//            return view('control_panel.hotel_rooms.update',compact('hotel_room'));
//        }else{
//            return redirect('/')->with('error','this user does not exist');
//        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel_Room  $hotel_room
     * @return \Illuminate\Http\Response
     */

    public function edit($hotel_room){

        if($hotel_room) {
            return view('control_panel.hotel_rooms.update',compact('hotel_room'));
        }else{
            return redirect('/')->with('error','this hotel_room does not exist');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel_Room  $hotel_room
     * @return \Illuminate\Http\Response
     */
    public function update(updateHotel_RoomRequest $request,$hotel_room)
    {
        if($hotel_room) {
            $hotel_room->update($request->validated());
            return redirect(route('hotel_rooms.index'));
//            redirect(route('hotel_rooms.index')->with('success','You edited the hotel_room successfully.'));
        }else{
            return redirect('/')->with('error','this hotel_room does not exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel_Room  $hotel_room
     * @return \Illuminate\Http\Response
     */

    public function destroy($hotel_room)
    {
        if($hotel_room) {
            $hotel_room->delete();
            return redirect(route('hotel_rooms.index'));
        }else{
            return redirect('/')->with('error','this hotel_room does not exist');
        }
    }
}
