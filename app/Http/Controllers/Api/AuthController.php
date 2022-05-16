<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Users\newUserAvatar;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    // if user logged in set
    public function updateAuthAvatar(newUserAvatar $request){
        $file = $request->file->store('public','public');
        if(Auth::user()->media){
            Auth::user()->media->update(['name'=>$file]);
        }else{
            Auth::user()->media()->create(['name'=>$file]);
        }
        return Auth::user()->user_avatar;
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|max:255|unique:users',
            'address' =>  'required|string|max:255',

            // for user image when register
            'file'=>'sometimes|image|mimes:jpg,png,jpeg|nullable',
            'password' => ['required', 'confirmed', Password::defaults()],

        ],
            [
                'name.string'=>'name must be string!',
                'email.string'=>'email must be string!',
                'address.string'=>'address must be string!',
                'email.unique'=>'email must be unique!',
                'name.required' => 'name is required!',
                'email.required' => 'email is required!',
                'address.required' => 'address is required!',
                'file.mimes' => 'file directory must be jpg or png or jpeg!',
                'file.image' => 'file must be image!',

            ]

        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' =>  $request->address,
            'password' => Hash::make($request->password),

        ]);


        if($request->file){
            $file = $request->file->store('public','public');
            $user->media()->create(['name'=>$file]);
        }
        // event(new Registered($user));

        $token = $user->createToken('authtoken');

        return response()->json(['message'=>'User Registered successfully', 'data'=> ['token' => $token->plainTextToken, 'user' => $user]]);

    }


    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->makeVisible('password');
            if (\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) { // true}else{//false}
                $token = $user->createToken('authtoken');

                return response()->json(
                    [
                        'message' => 'Logged in successfully',
                        'data' => [
                            'user' => UserResource::make($user),
                            'token' => $token->plainTextToken
                        ]
                    ]
                );
            } else {
                return response()->json(
                    [
                        'message' => 'the given was invalid',
                        'errors' => [
                            'password' => ["These credentials do not match our records",
                            ]
                        ],
                    ],404
                );
            }
        } else {
            return response()->json(
                [
                    'message' => 'the given was invalid',
                    'errors' => [
                        'email' =>[
                            "These credentials do not match our records"
                        ] ,
                    ]
                ],401
            );
        }

    }

    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();

        return response()->json(
            [
                'message' => 'Logged out'
            ]
        );

    }

}
