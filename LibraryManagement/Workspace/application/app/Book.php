<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function copy()
    {
        return $this->hasMany('App\BookCopy');
    }
}
