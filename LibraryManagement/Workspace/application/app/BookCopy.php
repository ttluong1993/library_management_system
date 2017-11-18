<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    protected $table = 'book_copies';

    public function book(){
        return $this->belongsTo('App\Book');
    }
}
