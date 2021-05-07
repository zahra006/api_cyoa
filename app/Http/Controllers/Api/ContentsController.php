<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentsController extends Controller
{
    public function contents(){
        $books = Content::orderBy('id','desc')->get();
        return response()->json([
            'success' => true,
            'contents' => $contents

        ]);
    }
}
