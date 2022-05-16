<?php

namespace App\Http\Controllers\Control_Panel;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Hotel_Advantages\newHotel_AdvantageRequest;
use App\Http\Requests\Api\Hotel_Advantages\updateHotel_AdvantageRequest;
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
//        $hotel_advantages = Hotel_Advantage::paginate(10);
        $hotel_advantages = Hotel_Advantage::all();
        return view('control_panel.hotel_advantages.index', compact('hotel_advantages'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_panel.hotel_advantages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(newHotel_AdvantageRequest $request)
    {
        $hotel_advantage = Hotel_Advantage::create($request->validated());
        return redirect(route('hotel_advantages.index'));
//        redirect(route('hotel_advantages.index')->with('success','You added a hotel_advantage successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Hotel_Advantage $hotel_advantage
     * @return \Illuminate\Http\Response
     */

    public function show($hotel_advantage)
    {
//        if($hotel_advantage) {
//            return view('control_panel.hotel_advantages.update',compact('hotel_advantage'));
//        }else{
//            return redirect('/')->with('error','this hotel_advantage does not exist');
//        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Hotel_Advantage $hotel_advantage
     * @return \Illuminate\Http\Response
     */

    public function edit($hotel_advantage)
    {

        if ($hotel_advantage) {
            return view('control_panel.hotel_advantages.update', compact('hotel_advantage'));
        } else {
            return redirect('/')->with('error', 'this hotel_advantage does not exist');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hotel_Advantage $hotel_advantage
     * @return \Illuminate\Http\Response
     */
    public function update(updateHotel_AdvantageRequest $request, $hotel_advantage)
    {
        if ($hotel_advantage) {
            $hotel_advantage->update($request->validated());
            return redirect(route('hotel_advantages.index'));
//            redirect(route('hotel_advantages.index')->with('success','You edited the hotel_advantage successfully.'));
        } else {
            return redirect('/')->with('error', 'this hotel_advantage does not exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\hotel_advantage $hotel_advantage
     * @return \Illuminate\Http\Response
     */

    public function destroy($hotel_advantage)
    {
        if ($hotel_advantage) {
            $hotel_advantage->delete();
            return redirect(route('hotel_advantages.index'));
//            return redirect(route('hotel_advantages.index')->with('success','You edited the hotel_advantage successfully.'));
        } else {
            return redirect('/')->with('error', 'this hotel_advantage does not exist');
        }
    }
}
