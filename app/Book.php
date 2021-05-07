<?php

namespace App;

use App\Comment;
use App\Book;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function contents(){
        return $this->hasMany(Content::class);
    }

    public function states(){
        return $this->hasMany(State::class);
    }
}
