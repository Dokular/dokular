<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Traits\PasswordLessAuth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginEmailRequest;
use App\Http\Requests\LoginTokenRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use PasswordLessAuth;

    public function attempt(LoginEmailRequest $request)
    {
        //return response()->json(['success' => true]);
        return $this->loginMail($request);
    }

    // verify token
    public function verify(LoginTokenRequest $request)
    {
        return $this->login($request['token']);
    }

    public function login($etoken){
        $input = $this->signIn($etoken);

        try{

            $user = User::where('email', $input)->first();
            //return $input;
            $token = null;

            if (!$token = JWTAuth::fromUser($user)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Email or Password',
                ], 401);
            }

            $this->clearEmailToken($etoken);

            return response()->json([
                'success' => true,
                'token' => $token,
            ]);

        }catch(\Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request){
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
