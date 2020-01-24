<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;

class AdminController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->json()->all(),[
                        'name' => 'required|string',
                        'email' => 'required|string|email|max:255|unique:admins',
                        'password' => 'required|string|min:6'
                    ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        // Admin::create([

        // ]);

    }
}
