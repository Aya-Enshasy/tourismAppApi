<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Favourite_Lists\newFavourite_ListRequest;
use App\Http\Requests\Api\Favourite_Lists\updateFavourite_ListRequest;
use App\Models\Favourite_List;
use Illuminate\Http\Request;

class Favourite_ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favourite_lists = Favourite_List::select('id','restaurant_dish_id','user_id')->get();
        return response()->json($favourite_lists);
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
    public function store(newFavourite_ListRequest $request)
    {
        Favourite_List::create($request->validated());
        return response()->json(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favourite_List  $favourite_List
     * @return \Illuminate\Http\Response
     */
    public function show( $favourite_List)
    {
        if($favourite_List) {
            return response()->json(['message'=>'success' , 'data'=> $favourite_List]);
        }else{
            return response()->json(['message' => 'this  favourite list does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favourite_List  $favourite_List
     * @return \Illuminate\Http\Response
     */
    public function edit( $favourite_List)
    {
        if($favourite_List) {
            return response()->json(['message'=>'success' , 'data'=> $favourite_List]);
        }else{
            return response()->json(['message' => 'this favourite list does not exist']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favourite_List  $favourite_List
     * @return \Illuminate\Http\Response
     */
    public function update(updateFavourite_ListRequest $request, $favourite_List)
    {
        if($favourite_List) {
            $favourite_List->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=> $favourite_List]);
        }else{
            return response()->json(['message' => 'this favourite list does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favourite_List  $favourite_List
     * @return \Illuminate\Http\Response
     */
    public function destroy( $favourite_List)
    {
        if($favourite_List) {
            $favourite_List->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this favourite list does not exist']);
        }
    }
}
