<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Comment;

class BooksController extends Controller
{
    public function books(){
        $books = Book::orderBy('id','desc')->get();
        return response()->json([
            'success' => true,
            'books' => $books

        ]);
    }
}
