<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookCopy;
use Log;
use Session;

class BookCopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($book_id)
    {
        return view('copy.create')->with('book_id', $book_id);
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
            'number_of_copies' => 'required|numeric',
            'price' => 'required|numeric',
        ));
        $book = Book::find($request->book_id);
        if($book != null){
            $book->number_of_copies = $book->number_of_copies + $request->number_of_copies;
            $book->save();
        }else{
            Session::flash('falled', 'The book_id attribute is not valid!');
        }

        for($i = 1; $i <= $request->number_of_copies; $i++){
            $copy = new BookCopy;
            $copy->type_of_copy = $request->type_of_copy;
            $copy->price = $request->price;
            if($request->type_of_copy == 'referenced'){
                $copy->copy_status = 'referenced';        
            }else {
                $copy->copy_status = 'available';        
            }
            $copy->book_id = $request->book_id;
            $copy->save();
        }
        Session::flash('success', 'The copies was successfully added!');
        return redirect()->route('book.show', $request->book_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('copy.edit')->with('book_id', $id);
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
        //
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
