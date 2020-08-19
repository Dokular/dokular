<?php
namespace App\Traits;

use App\Models\Login;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Jobs\LoginEmail;

trait PasswordLessAuth{

    use AuthenticatesUsers;


    public function loginMail($email)
    {

        // $this->incrementLoginAttempts($request);

        // if ($this->hasTooManyLoginAttempts($request)) {
        //     $this->fireLockoutEvent($request);

        //     return $this->sendLockoutResponse($request);
        // }

        if ($this->createLoginAttempt($email)) {
            //return $this->sendAttemptResponse($request);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
        //return $this->sendFailedLoginResponse($request);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signIn($token)
    {

        return $this->attemptLogin($token);
        //return $this->auth();
        // if ($this->hasTooManyLoginAttempts($request)) {
        //     $this->fireLockoutEvent($request);

        //     return $this->sendLockoutResponse($request);
        // }

        // if ($this->attemptLogin($token)) {
        //     return $this->sendLoginResponse($request);
        // }

        // $this->incrementLoginAttempts($request);

        // return $this->sendFailedLoginResponse($request);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param string $token
     * @param \Illuminate\Http\Request  $request
     * @return object
     */
    protected function attemptLogin($token)
    {
        $login = Login::userFromToken($token);

        //if (is_object($login)) {
            return $login;
        //}
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\LoginAttempt
     */
    protected function createLoginAttempt($email)
    {
        $authorize = Login::create([
            'email' => $email,
            'token' => Str::random(40) . time(),
        ]);

        // if(!$authorize){
        //     return response()->json(['success' => false], 400);
        // }
        dispatch(new LoginEmail($authorize));
        return response()->json(['success' => true], 200);
    }

    public function clearEmailToken($token)
    {
        Login::where('token', $token)->delete();
    }


}
