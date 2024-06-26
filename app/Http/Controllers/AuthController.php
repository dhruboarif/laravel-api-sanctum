<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
class AuthController extends Controller
{
    public function register(Request $request){
        $fields=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);
        $user=User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
             'password'=>bcrypt($fields['password'])

        ]);
        $token=$user->createToken('myapptoken')->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->logout();

        return [
            'message'=>'Logged out'
        ];
    }

    public function login(Request $request){
        $fields=$request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);

        $user = User::where('email', $request->email)->first(); 
        if (!$user ||! \Hash::check($request->password, $user->password)) {
            return response([
               'message' => 'The provided credentials are incorrect'
            ], 401);
        }

        $token=$user->createToken('myapptoken')->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);

    }
}
