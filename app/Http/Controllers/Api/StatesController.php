<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;

class StatesController extends Controller
{
    public function states(){
        $states = State::orderBy('id','desc')->get();
        return response()->json([
            'success' => true,
            'states' => $states
        ]);
    }
}
