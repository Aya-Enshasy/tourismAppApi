<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Media\updateMediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( MediaResource::collection(Media::all()) );
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show( $media)
    {
        if($media) {
            return response()->json(['message'=>'success' , 'data'=>  MediaResource::make($media)]);
        }else{
            return response()->json(['message' => 'this media does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit( $media)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(updateMediaRequest $request, $media)
    {
        if($media) {
            $media->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=>  MediaResource::make($media)]);
        }else{
            return response()->json(['message' => 'this media does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media $media
     * @return \Illuminate\Http\Response
     */
    public function destroy( $media)
    {
        if($media) {
            $media->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this media does not exist']);
        }
    }
}
