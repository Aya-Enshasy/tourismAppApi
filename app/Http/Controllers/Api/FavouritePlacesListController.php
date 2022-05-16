<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\newFavouritePlaceRequest;
use App\Http\Requests\updateFavouritePlaceRequest;
use App\Http\Resources\FavouritePlaceResource;
use App\Models\FavouritePlacesList;
use Illuminate\Http\Request;

class FavouritePlacesListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( FavouritePlaceResource::collection(FavouritePlacesList::all()) );
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
    public function store(newFavouritePlaceRequest $request)
    {
        FavouritePlacesList::create($request->validated());
        return response()->json(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FavouritePlacesList  $favouritePlacesList
     * @return \Illuminate\Http\Response
     */
    public function show( $favouritePlacesList)
    {
        if($favouritePlacesList) {
            return response()->json(['message'=>'success' , 'data'=>  FavouritePlaceResource::make($favouritePlacesList)]);
        }else{
            return response()->json(['message' => 'this favourite list does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FavouritePlacesList  $favouritePlacesList
     * @return \Illuminate\Http\Response
     */
    public function edit(FavouritePlacesList $favouritePlacesList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FavouritePlacesList  $favouritePlacesList
     * @return \Illuminate\Http\Response
     */
    public function update(updateFavouritePlaceRequest $request, $favouritePlacesList)
    {
        if($favouritePlacesList) {
            $favouritePlacesList->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=>  FavouritePlaceResource::make($favouritePlacesList)]);
        }else{
            return response()->json(['message' => 'this favourite list does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FavouritePlacesList  $favouritePlacesList
     * @return \Illuminate\Http\Response
     */
    public function destroy( $favouritePlacesList)
    {
        if($favouritePlacesList) {
            $favouritePlacesList->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this favourite list does not exist']);
        }
    }
}
