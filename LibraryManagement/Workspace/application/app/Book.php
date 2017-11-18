<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'publisher',
        'authors',
        'isbn',
        'number_of_copies'
    ];

    /**
     * Get referenced book's copies
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function copies()
    {
        return $this->hasMany('App\BookCopy');
    }

    /**
     * Update number of copies by counting
     * @return void
     */
    public function updateNumberOfCopies()
    {
        $this->update([
           'number_of_copies' => $this->getAttribute('copies')
                                    ->count()
        ]);
    }
}
