<?php

namespace App;

use App\Book;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
