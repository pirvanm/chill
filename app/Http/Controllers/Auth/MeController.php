<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Resources\UserResource;

class MeController extends Controller
{
    public function getMe(Request $request){
    	return  new UserResource($request->user());
    }
}
