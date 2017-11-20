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

/*
 * Static pages
 */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@show')->name('about');

/*
 * Login and Logout pages
 */
Auth::routes();
//Route::get('/login', 'Auth\LoginController@showLoginForm')->name("login");
//Route::post('/login', 'Auth\LoginController@login');
//Route::post('/logout', 'Auth\LoginController@logout')->name("logout");
//Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name("register");
//Route::post('/register', 'Auth\RegisterController@register');

Route::middleware(['auth', 'decentralize'])->group(function () {
    Route::resource('book', 'BookController');
    Route::get('/book/{book_id}/copy/create', ['as' => 'book.copy.create', 'uses' => 'BookCopyController@create']);
    Route::post('/book/{book_id}/copy', ['as' => 'book.copy.store', 'uses' => 'BookCopyController@store']);
});
