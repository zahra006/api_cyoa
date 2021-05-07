<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function content(){
        return $this->belongsTo(Content::class);
    }
}
