<?php

namespace App\Http\Controllers\Control_Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Users\newUserRequest;
use App\Http\Requests\Api\Users\updateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('control_panel.users.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_panel.users.create');
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
        return redirect(route('users.index'));
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
            return response()->json(['message'=>'success' , 'data'=> $user]);
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
        if($user) {
            return view('control_panel.users.update',compact('user'));
        }else{
            return redirect('/')->with('error','this user does not exist');
        }
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
            if($request->file) {
                $file = $request->file->store('public','public');
                if($user->media){
                    $user->media->update(['name'=>$file]);
                }else{
                    $user->media()->create(['name'=>$file]);
                }
            }
            $user->update($request->validated());
            return redirect(route('users.index'));
        }else{
            return redirect('/')->with('error','this user does not exist');
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
            return redirect(route('users.index'));
        }else{
            return redirect('/')->with('error','this user does not exist');
        }


    }

}
