<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;

class LgaController extends Controller
{
    public function get(State $state)
    {
        return response()->json(['success' => true, 'data' => $state->lgas]);
    }
}
