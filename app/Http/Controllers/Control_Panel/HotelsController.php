<?php

namespace App\Http\Controllers\Control_Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Hotels\newHotelRequest;
use App\Http\Requests\Api\Hotels\updateHotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $hotels = Hotel::paginate(10);
        $hotels = Hotel::all();
        return view('control_panel.hotels.index',compact('hotels'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_panel.hotels.create');
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
        return redirect(route('hotels.index'));
//        redirect(route('hotels.index')->with('success','You added a hotel successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */

    public function show($hotel){
//        if($hotel) {
//            return view('control_panel.hotels.update',compact('hotel'));
//        }else{
//            return redirect('/')->with('error','this user does not exist');
//        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */

    public function edit($hotel){

        if($hotel) {
            return view('control_panel.hotels.update',compact('hotel'));
        }else{
            return redirect('/')->with('error','this hotel does not exist');
        }
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
            return redirect(route('hotels.index'));
//            redirect(route('hotels.index')->with('success','You edited the hotel successfully.'));
        }else{
            return redirect('/')->with('error','this hotel does not exist');
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
            return redirect(route('hotels.index'));
        }else{
            return redirect('/')->with('error','this hotel does not exist');
        }
    }

//    public function deleteAllHotels()
//    {
//        Hotel::truncate();
//        return redirect(route('hotels.index'));
//
//    }


//    public function hotelRooms($hotel){
//        if($hotel) {
//            $rooms = $hotel->rooms;
//            return redirect(route('hotels.hotel_rooms',compact('rooms')));
//        }else{
//            return redirect('/')->with('error','this hotel does not exist');
//        }
//    }

}
