<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BookCopy extends Model
{
    protected $table = 'book_copies';

    /**
     * Get referenced book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book(){
        return $this->belongsTo('App\Book');
    }

    /**
     * Create new copy for a book
     *
     * @param Book $book
     * @param Request $request
     * @return BookCopy
     */
    public function createForBook(Book $book, Request $request)
    {
        $this->setAttribute('type_of_copy', $request->input('type_of_copy'))
            ->setAttribute('price', $request->input('price'))
            ->setAttribute('book_id', $book->getAttribute('id'));

        if($request->input('type_of_copy') == 'referenced'){
            $this->setAttribute('copy_status', 'referenced');
        }else {
            $this->setAttribute('copy_status', 'available');
        }

        $this->save();

        return $this;
    }
}
