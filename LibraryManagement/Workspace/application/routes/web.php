<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages/index');
});
Route::resource('book', 'BookController');
Route::get('/book/{book_id}/copy/create', ['as' => 'book.copy.create', 'uses' => 'BookCopyController@create']);
Route::post('/book/{book_id}/copy', ['as' => 'book.copy.store', 'uses' => 'BookCopyController@store']);