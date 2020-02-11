<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

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
           return response()->json($validator->errors(), 400);
        }

        Admin::create([
            'name' => $request->json()->get('name'),
            'email' => $request->json()->get('email'),
            'password' => $request->json()->get('password')
        ]);

        return response()->json(['success' => true], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->json()->all(),[
            'email' => 'required|email',
            'password' => 'required'
         ]);

        if($validator->fails()){
          return response()->json($validator->errors(), 400);
        }

        $credentials = $request->only('email', 'password');
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['status' => 'success'], 200)->header('Authorization', $token);;
    }


    /**
     * Logout User
     */
    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }
    /**
     * Get authenticated user
     */
    public function user(Request $request)
    {
        $user = Admin::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }
    /**
     * Refresh JWT token
     */
    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }
    /**
     * Return auth guard
     */
    private function guard()
    {
        return Auth::guard();
    }
}
