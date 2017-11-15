<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookCopy;
use Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index')->withBooks($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
                'title' => 'required|unique:books|max:255',
                'publisher'  => 'required|max:255',
                'authors'  => 'required|max:255',
                'isbn'  => 'required|unique:books|max:255',
                'price' => 'required|numeric',
            ));
        // store in the database
        $book = new Book;
        $book->title = $request->title;
        $book->publisher = $request->publisher;
        $book->authors = $request->authors;
        $book->isbn = $request->isbn;
        $book->number_of_copies = 1;
        $book->save();

        $copy = new BookCopy;
        $copy->type_of_copy = $request->type_of_copy;
        if($request->type_of_copy == 'referenced'){
            $copy->copy_status = 'referenced';        
        }else {
            $copy->copy_status = 'available';        
        }
        $copy->price = $request->price;
        $copy->book_id = $book->id;
        $copy->save();
        Session::flash('success', 'The book was successfully save!');
        return redirect()->route('books.show', $book->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show')->withBook($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('copies.edit')->with('book_id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the data
        $this->validate($request, array(
            'number_of_copies' => 'required|numeric',
            'price' => 'required|numeric',
        ));
        $book = Book::find($id);
        $book->number_of_copies = $book->number_of_copies + $request->number_of_copies;
        $book->save();

        for($i = 1; $i <= $request->number_of_copies; $i++){
            $copy = new BookCopy;
            $copy->type_of_copy = $request->type_of_copy;
            $copy->price = $request->price;
            if($request->type_of_copy == 'Referenced'){
                $copy->copy_status = 'referenced';        
            }else {
                $copy->copy_status = 'available';        
            }
            $copy->book_id = $id;
            $copy->save();
        }
        Session::flash('success', 'The copies was successfully added!');
        return redirect()->route('books.show', $id);
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
