<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use JWTFactory;
// use JWTAuth;
use Validator;
use Response;

class APIRegisterController extends Controller
{
    public function register( Request $request){


        $validator = Validator::make($request -> all(),[
         'email' => 'required|string|email|max:255|unique:users',
         'name' => 'required',
         'password'=> 'required'
        ]);

        if ($validator -> fails()) {
            # code...
            return response()->json($validator->errors());
            
        }

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password'=> bcrypt($request->get('password')),
        ]);
        $users = User::first();
        $token = JWTAuth::fromUser($users);
        
        
        return Response::json(compact('token'));
    }
}
