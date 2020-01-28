<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function getAll()
    {
        return response()->json(['data' => State::all()]);
    }

    public function setActive(Request $request, State $state)
    {
        $validated =   $request->validate([
                            'active' => 'required|boolean'
                        ]);

        if($state->updateActiveStatus($validated)){
            return response()->json(['success' => true], 200);
        }
    }

    public function update(Request $request, State $state)
    {
        if($state->update(['price' => $request->input('price')])){
          return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false], 400);
    }
}
