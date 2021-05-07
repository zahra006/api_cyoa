<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;

class ContentsController extends Controller
{
    public function contents(){
        $contents = Content::orderBy('id','desc')->get();
        return response()->json([
            'success' => true,
            'contents' => $contents

        ]);
    }
}
