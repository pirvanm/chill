<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){

    	$user = User::Where('email', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('email')->accessToken;
                
                return (new UserResource($user))
                ->additional(['meta' => [
                    'token' => $token,
                ]]);
                return response()->json(['user' => $user, 'token' => $token]);
            }else{
                return response()->json(['errors' => [
                    'password' => [
                        'Password Not Matched'
                    ]
                ]], 422);
            }
        }
        return response()->json(['errors' => [
            'email' => [
                'Email not found or Verify Your kyc and email'
            ]
        ]], 422);
    }
}
