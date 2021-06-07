<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function fbLogin()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function fbCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $oUser = User::where('email', $user->getEmail())->first();

        if ($oUser) {

            return response()->json([
                'user' => $oUser,
                'token' => $oUser->createToken('Login', ['user'])->plainTextToken
            ]);
        } else {

            $oUser = new User();
            $oUser->name = $user->getName();
            $oUser->email = $user->getEmail();
            $oUser->token = $user->token;
            $oUser->email_verified_at = now();
            $oUser->save();

            return response()->json([
                'user' => $oUser,
                'token' => $oUser->createToken('Login', ['user'])->plainTextToken
            ]);
        }
    }
}
