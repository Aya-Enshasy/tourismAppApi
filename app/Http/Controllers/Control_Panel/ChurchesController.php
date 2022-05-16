<?php

namespace App\Http\Controllers\Control_Panel;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Churches\newChurchRequest;
use App\Http\Requests\Api\Churches\updateChurchRequest;
use App\Models\Church;
use Illuminate\Http\Request;

class ChurchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $churches = Church::paginate(10);
        $churches = Church::all();
        return view('control_panel.churches.index',compact('churches'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_panel.churches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(newChurchRequest $request)
    {
        $church = church::create($request->validated());
        if ($request->file) {
            $image_name = $request->file->store('public', 'public');
            $church->media()->create(['name' => $image_name]);
        }
        return redirect(route('churches.index'));
//        redirect(route('churches.index')->with('success','You added a church successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */

    public function show($church){
//        if($church) {
//            return view('control_panel.churches.update',compact('church'));
//        }else{
//            return redirect('/')->with('error','this user does not exist');
//        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */

    public function edit($church){

        if($church) {
            return view('control_panel.churches.update',compact('church'));
        }else{
            return redirect('/')->with('error','this church does not exist');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function update(updateChurchRequest $request,$church)
    {
        if($church) {
            if($request->file) {
                $file = $request->file->store('public','public');
                if($church->media){
                    $church->media->update(['name'=>$file]);
                }else{
                    $church->media()->create(['name'=>$file]);
                }
            }
            $church->update($request->validated());
            return redirect(route('churches.index'));
//            redirect(route('churches.index')->with('success','You edited the church successfully.'));
        }else{
            return redirect('/')->with('error','this church does not exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */

    public function destroy($church)
    {
        if($church) {
            $church->delete();
            return redirect(route('churches.index'));
        }else{
            return redirect('/')->with('error','this church does not exist');
        }
    }
}
