<?php
namespace App\Traits;

use App\Login;
use App\Mail\LoginEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

trait PasswordLessAuth{

    use AuthenticatesUsers;


    public function loginMail($request)
    {

        // $this->incrementLoginAttempts($request);

        // if ($this->hasTooManyLoginAttempts($request)) {
        //     $this->fireLockoutEvent($request);

        //     return $this->sendLockoutResponse($request);
        // }

        if ($this->createLoginAttempt($request)) {
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
    protected function createLoginAttempt($request)
    {
        $authorize = Login::create([
            'email' => $request->input($this->username()),
            'token' => Str::random(40) . time(),
        ]);

        //$authorize->notify(new NewLoginAttempt($authorize));
        Mail::to($authorize->email)->send(new LoginEmail($authorize));
        return $authorize;
    }

    public function clearEmailToken($token)
    {
        Login::where('token', $token)->delete();
    }


}
