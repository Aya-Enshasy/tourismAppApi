<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Users\newUserRequest;
use App\Http\Requests\Api\Users\updateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( UserResource::collection(User::all()) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(newUserRequest $request)
    {
        $user = User::create($request->validated());
        if($request->file){
            $file = $request->file->store('public','public');
            $user->media()->create(['name'=>$file]);
        }
        return response()->json(['message'=>'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show( $user)
    {
        if($user) {
            return response()->json(['message'=>'success' , 'data'=>  UserResource::make($user)]);
        }else{
            return response()->json(['message' => 'this user does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(updateUserRequest $request, $user)
    {
        if($user) {
            $user->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=>  UserResource::make($user)]);
        }else{
            return response()->json(['message' => 'this user does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        if($user) {
            $user->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this user does not exist']);
        }
    }


}
