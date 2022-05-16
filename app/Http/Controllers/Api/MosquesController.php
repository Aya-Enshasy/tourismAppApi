<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Mosques\newMosqueRequest;
use App\Http\Requests\Api\Mosques\updateMosqueRequest;
use App\Http\Resources\MosqueResource;
use App\Models\Mosque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MosquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return response()->json( MosqueResource::collection(Mosque::all()) );

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
    public function store(newMosqueRequest $request)
    {
        $mosque = Mosque::create($request->validated());
        if($request->file){
            $file = $request->file->store('public','public');
            $mosque->media()->create(['name'=>$file]);
        }
        return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function show($mosque){
        if($mosque) {
            return response()->json(['message'=>'success' , 'data'=>  MosqueResource::make($mosque)]);
        }else{
            return response()->json(['message' => 'this mosque does not exist']);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */

    public function edit($mosque){
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function update(updateMosqueRequest $request, $mosque)
    {
        if($mosque) {
            if($request->file) {
                $file = $request->file->store('public','public');
                if($mosque->media){
                    $mosque->media->update(['name'=>$file]);
                }else{
                    $mosque->media()->create(['name'=>$file]);
                }
            }
            $mosque->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=>  MosqueResource::make($mosque)]);
        }else{
            return response()->json(['message' => 'this mosque does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */

    public function destroy($mosque)
    {
        if($mosque) {
            $mosque->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this mosque does not exist']);
        }
    }
}
