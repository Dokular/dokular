<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function get()
    {
        return response()->json(['success' => true, State::active()->get()]);
    }
}
