<?php

namespace App\Http\Controllers\Control_Panel\later;

use App\Http\Controllers\Control_Panel\Room_Reservation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\later\Room_Reservations\newRoom_ReservationRequest;
use App\Http\Requests\Api\later\Room_Reservations\updateRoom_ReservationRequest;
use function redirect;
use function view;

class Room_ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Room_Reservation = room_reservation::paginate(10);
        $room_reservations = Room_Reservation::all();
        return view('control_panel.room_reservations.index',compact('room_reservations'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_panel.room_reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(newRoom_ReservationRequest $request)
    {
        $room_reservation = room_reservation::create($request->validated());
        if ($request->hasFile('files')) {
            $image_name = $request->file->store('public', 'public');
            $room_reservation->media()->create(['name' => $image_name]);
        }
        return redirect(route('room_reservations.index'));
//        redirect(route('room_reservations.index')->with('success','You added a room_reservation successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room_Reservation  $room_reservation
     * @return \Illuminate\Http\Response
     */

    public function show($room_reservation){
//        if($room_reservation) {
//            return view('control_panel.room_reservations.update',compact('room_reservation'));
//        }else{
//            return redirect('/')->with('error','this user does not exist');
//        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room_Reservation  $room_reservation
     * @return \Illuminate\Http\Response
     */

    public function edit($room_reservation){

        if($room_reservation) {
            return view('control_panel.room_reservations.update',compact('room_reservation'));
        }else{
            return redirect('/')->with('error','this room_reservation does not exist');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room_Reservation  $room_reservation
     * @return \Illuminate\Http\Response
     */
    public function update(updateRoom_ReservationRequest $request,$room_reservation)
    {
        if($room_reservation) {
            $room_reservation->update($request->validated());
            return redirect(route('room_reservations.index'));
//            redirect(route('room_reservations.index')->with('success','You edited the room_reservation successfully.'));
        }else{
            return redirect('/')->with('error','this room_reservation does not exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room_Reservation  $room_reservation
     * @return \Illuminate\Http\Response
     */

    public function destroy($room_reservation)
    {
        if($room_reservation) {
            $room_reservation->delete();
            return redirect(route('room_reservations.index'));
        }else{
            return redirect('/')->with('error','this room_reservation does not exist');
        }
    }
}
