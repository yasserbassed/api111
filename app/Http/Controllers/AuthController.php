<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        /* $validated = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|max:255|unique:users',
            'password'=>'required|confirmed|min:8'
        ]); */
        $validated = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|max:255|unique:users',
            'password'=>'required|confirmed|min:8'
        ]);
        if($validated->failed()){
            return response()->json($validated->errors(),422);
        }
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
<<<<<<< HEAD
<<<<<<< HEAD
                'password'=>$request->password
=======
                'password'=>Hash::make($request->password)
=======
                'password'=>Hash::make($request->password)
=======
                'password'=>$request->password
>>>>>>> d740fb6 (TASTING1)
>>>>>>> origin/main
            ]);
            $token =$user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token'=>$token,
                'user'=> $user
            ],200);
        } catch (\Throwable $exception) {
            return response()->json([
                'error'=>$exception->getMessage()
            ],403);
        }
    }
    public function login(Request $request){
        $validated = Validator::make($request->all(),[
            'email'=>'required|email|string ',
            'password'=>'required|min:8'
        ]);
        if($validated->failed()){
            return response()->json($validated->errors(),422);
        }
        $credentials=['email'=>$request->email,'password'=>$request->password];
        try {
            if (!auth()->attempt($credentials)) {
                return response()->json(['error'=>'invalid credentials'],403);
            }
            $user = User::where('email',$request->email)->firstOrFail();
            $token =$user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'access_token'=>$token,
                'user'=> $user
            ],200);
        } catch (\Throwable $ex) {
            return response()->json([
                'error'=>$ex->getMessage()
            ],403);
        }

        return response()->json("",200);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=> 'user is logout'
        ],200);
    }
}
