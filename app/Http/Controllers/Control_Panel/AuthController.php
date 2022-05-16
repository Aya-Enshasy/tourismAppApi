<?php

namespace App\Http\Controllers\Control_Panel;

use App\Http\Controllers\Controller;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function login(LoginRequest $request){
        return view('control_panel.adminLogin');
    }

    public function store(){
        $admin = 'r@gmail.com';

        $userInfo = request()->validate([
            'email'=>'required|in:$admin',
            'password'=>'required'
        ]);
//
//        if(auth()->attempt($userInfo)){
//            return redirect('control_panel.users.index')->with('success','welcome back');
//        }
//
//        //auth failed
//        throw ValidationException::withMessage([
//            'email'=>'your provided credential not be verified'
//        ]);
    }

    public function  logout(){
        auth()->logout();
        return redirect('/')->with('success','user just logged out');
    }
}
