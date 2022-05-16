<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Churches\newChurchRequest;
use App\Http\Requests\Api\Churches\updateChurchRequest;
use App\Http\Resources\ChurchResource;
use App\Models\Church;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChurchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( ChurchResource::collection(Church::all()) );
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
    public function store(newChurchRequest $request)
    {

        $church = Church::create($request->validated());
        if($request->file){
            $file = $request->file->store('public','public');
            $church->media()->create(['name'=>$file]);
        }
        return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function show($church){
        if($church) {
            return response()->json(['message'=>'success' , 'data'=> ChurchResource::make($church)]);
        }else{
            return response()->json(['message' => 'this church does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function edit($church){
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function update(updateChurchRequest $request, $church )
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
            return response()->json(['message'=>'success' , 'data'=> ChurchResource::make($church)]);
        }else{
            return response()->json(['message' => 'this church does not exist']);
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
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this church does not exist']);
        }
    }
}
