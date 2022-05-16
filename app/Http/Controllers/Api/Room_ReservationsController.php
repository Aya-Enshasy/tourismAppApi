<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\later\Room_Reservations\newRoom_ReservationRequest;
use App\Http\Requests\Api\later\Room_Reservations\updateRoom_ReservationRequest;
use App\Http\Resources\Room_ReservationResource;
use App\Models\Hotel_Room;
use App\Models\Room_Reservation;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Room_ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Room_ReservationResource::collection(Room_Reservation::all()) );

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
    public function store(newRoom_ReservationRequest $request)
    {

//        $reservation = Room_Reservation::create($request->validated());
//        return response()->json(['message' => 'room reserved successfull']);


        $hotel_room = Hotel_Room::where('id', $request->hotel_room_id)->first();

//        $hotel_room = Hotel_Room::findOrFail('hotel_room_id', $request->hotel_room_id)();
//        $hotel_room = Hotel_Room::where('id', $request->hotel_room_id)->first() ?? false;

        if (empty($hotel_room)) {
            response()->json(['error' => 'room doesnt exists']);
        } else {



            $user = Room_Reservation::where('user_id',auth()->user()->id)->first();
            if ($user === null) {

                // add first room to reservations

            } else {

                $previousRoomsHotel = DB::table('room_reservations')->select('hotel_id')->where('user_id','=', auth()->user()->id)->first();

                // check if user has reservations and from which hotel

                if($previousRoomsHotel === $hotel_room->hotel_id){

                    $room_reservation = Room_Reservation::where('user_id', auth()->user()->id)->where('hotel_room_id', $hotel_room->id)->first();

                    $already_reserved = $room_reservation->where('check_in_date', $room_reservation->check_in_date)
                        ->where('check_out_date', $room_reservation->check_out_date)->first();

                    // check if room already reserved with same reservation data
                    if($already_reserved) {

                        if ($already_reserved->hotel_room['available_rooms'] < $already_reserved->rooms_count || $already_reserved->hotel_room->available_rooms <= 0) {
                            response()->json(['error'=>'no more available rooms of this specific one in the hotel']);
                        }else{
                            $already_reserved->rooms_count = $already_reserved->rooms_count + 1;
                            if ($hotel_room->has_offer != null ) {
                                $already_reserved->total_price = ($hotel_room->price_per_night * $hotel_room->has_offer)/100 * $already_reserved->rooms_count;
                            }else{
                                $already_reserved->total_price = $hotel_room->price_per_night * $already_reserved->rooms_count;
                            }
                            return response()->json(['message'=>'room added to reservation successfully ']);
                        }

                    }else{

                        if ($hotel_room->available_rooms <= 0) {
                            response()->json(['error'=>'no more available rooms of this specific one in the hotel']);
                        }else{
                            $reservation = new Room_Reservation();
                            $reservation->user_id = auth()->user()->id;
                            $reservation->hotel_room_id = $hotel_room->id;

                            if ($hotel_room->has_offer != null ) {
                                $reservation->total_price = ($hotel_room->price_per_night * $hotel_room->has_offer)/100 * $already_reserved->rooms_count;
                            }else{
                                $reservation->total_price = $hotel_room->price_per_night * $already_reserved->rooms_count;
                            }
                            $reservation->rooms_count = $already_reserved->rooms_count;
                            $reservation->nights = $reservation->check_in_date->diff($reservation->check_out_date); // nights calculated by the different between dates .

                            return response()->json(['message'=>'room reserved successfully ']);
                        }
                    }

                }else{
                    return response()->json(['error'=>'sorry you cant reserve multiple rooms from different hotels ']);
                }

            }

        }

    }


        /*

            $available_rooms = DB::table('hotel_rooms')->select('hotel_room.available_rooms')->where('hotel_room_id', $hotel_room->id)->get();

            $room_price = DB::table('hotel_rooms')->select('hotel_room.price_per_night')->where('hotel_room_id', $hotel_room->id)->get();

            $room_offer = DB::table('hotel_rooms')->select('hotel_room.has_offer')->where('hotel_room_id', $hotel_room->id)->get();

            $room_hotel = DB::table('hotel_rooms')->select('hotel_room.hotel_id')->where('hotel_room_id', $hotel_room->id)->get();
        //--------------------------------------------------------------------------------------------------------------------------------------
        //        Room_Reservation::updateOrCreate(
        //            [
        //            'user_id'=>Auth::id(),
        //            'hotel_room_id'=> $request->input('hotel_room_id'),
        //            ],
        //            [
        //            'user_id'=>Auth::id(),
        //            'available_rooms' => DB::table('hotel_rooms')->update(['available_rooms' => DB::raw('GREATEST(available_rooms - 1, 0)')]),
        //            'nights'=>DB::raw('nights + ' . $request->input('nights',1)),
        //            'total_price'=>$request->input('total_price'), //     $cart->update(['product_price' => $cart->product_qty * $product->price]);
        //        ]);

        */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room_Reservation  $room_Reservation
     * @return \Illuminate\Http\Response
     */
    public function show($room_Reservation)
    {
        if($room_Reservation) {
            return response()->json(['message'=>'success' , 'data'=>  Room_ReservationResource::make($room_Reservation)]);
        }else{
            return response()->json(['error' => 'this reservation does not exist']);
        }
    }


    public function authUserReservations(){
        // $reservations = auth()->user()->user_reserved_rooms;
        $reservations = Room_Reservation::where('user_id',auth()->user()->id)->get();
        if (empty($reservations)) {
            return response()->json(['error' => 'this user does not have any reservations yet']);
        } else {
            // $reservations = auth()->user()->user_reserved_rooms;
            return response()->json(['message'=>'success' , 'reservations'=> $reservations]);
        }
    }


    public function UserReservations($user){
        $user = User::find($user);
        if($user) {
            $reservations = Room_Reservation::where('user_id',$user)->get();
            if (empty($reservations)) {
                return response()->json(['error' => 'this user does not have any reservations yet']);
            } else {
                return response()->json(['message'=>'success' , 'reservations'=> $reservations]);
            }
        }else{
            return response()->json(['error' => 'this user does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room_Reservation  $room_Reservation
     * @return \Illuminate\Http\Response
     */
    public function edit($room_Reservation)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room_Reservation  $room_Reservation
     * @return \Illuminate\Http\Response
     */
    public function update(updateRoom_ReservationRequest $request, $room_Reservation)
    {
        if($room_Reservation) {
            $room_Reservation->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=>  Room_ReservationResource::make($room_Reservation)]);
        }else{
            return response()->json(['error' => 'this reservation does not exist']);
        }
    }

    // update user's reservation (dates and rooms count )


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room_Reservation  $room_Reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($room_Reservation)
    {
        if($room_Reservation) {
            $room_Reservation->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['error' => 'this reservation does not exist']);
        }
    }

    // delete user's reservation


//    public function deleteAuthUserReservedRoom($hotel_room_id){
//        $hotel_room_id = Hotel_Room::find($hotel_room_id);
//        if($hotel_room_id){
//            $reservation = Room_Reservation::where('user_id',auth()->user()->id)->where('hotel_room_id',$hotel_room_id);
//            if (empty($reservation->get())) {
//                return response()->json(['error' => 'user does not reserved this room']);
//            } else {
//                $reservation->delete();
//                return response()->json(['message'=>'success']);
//            }
//        }else{
//            return response()->json(['error' => 'this hotel_room does not exist']);
//        }
//    }
//


    public function deleteAuthUserReservedRoom($room_Reservation){
        if($room_Reservation){
            $room_Reservation->delete();
                return response()->json(['message'=>'success']);
        }else{
            return response()->json(['error' => 'this room_Reservation does not exist']);
        }
    }

    public function updateAuthUserReservedRoom(updateRoom_ReservationRequest $request, $room_Reservation){
        if($room_Reservation){
            $room_Reservation->update($request->validated());
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['error' => 'this room_Reservation does not exist']);
        }
    }

}
