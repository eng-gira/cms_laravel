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
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/new', 'PostController@newPost');
Route::post('/post/store', 'PostController@storePost');
Route::get('/post/edit/{post}', 'PostController@editPost');
Route::post('/posts/update/{post}', 'PostController@updatePost');
Route::delete('/posts/delete/{post}', 'PostController@deletePost');
