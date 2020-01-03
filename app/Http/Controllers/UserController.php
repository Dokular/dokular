<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;

class UserController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function user()
    {
        return $this->user;
    }
}
