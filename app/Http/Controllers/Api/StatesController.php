<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatesController extends Controller
{
    public function states(){
        $books = State::orderBy('id','desc')->get();
        return response()->json([
            'success' => true,
            'states' => $states

        ]);
    }
}
