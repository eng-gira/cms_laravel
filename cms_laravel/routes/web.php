<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/new', 'PostController@new_post');
Route::post('/post/store', 'PostController@store_post');
Route::get('/post/show/{post}', 'PostController@show_post');
Route::get('/post/edit/{post}', 'PostController@edit_post');
Route::post('/post/update/{post}', 'PostController@update_post');
Route::delete('/post/delete/{post}', 'PostController@delete_post');
Route::get('/post/upvote/{post}', 'PostController@upvote_post');
Route::get('/post/downvote/{post}', 'PostController@downvote_post');
