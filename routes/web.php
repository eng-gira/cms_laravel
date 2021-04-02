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

Route::get('/', 'PagesController@main');

Auth::routes();

Route::get('/about', 'PagesController@about');
Route::get('/dashboard', 'DashboardController@index');//->name('home');
Route::get('/settings', 'DashboardController@settings');
Route::get('/post/new', 'PostController@new_post');
Route::post('/post/store', 'PostController@store_post');
Route::get('/post/show/{post}', 'PostController@show_post');
Route::get('/post/edit/{post}', 'PostController@edit_post');
Route::post('/post/update/{post}', 'PostController@update_post');
Route::delete('/post/delete/{post}', 'PostController@delete_post');
Route::get('/post/upvote/{post}', 'PostController@upvote_post');
Route::get('/post/downvote/{post}', 'PostController@downvote_post');
Route::post('/post/search', 'PostController@search');
Route::get('/admin/hire_moderator/{selected_user_id}', 'AdminController@hire_moderator');
Route::get('/admin/fire_moderator/{moderator_id}', 'AdminController@fire_moderator');
Route::get('/admin/show_all_users', 'AdminController@show_all_users');
Route::get('/admin/force_delete_user/{user_id}', 'AdminController@force_delete_user');
Route::get("/user/quit_moderation", 'UserController@quit_moderation');
Route::post("/user/update_user_name", 'UserController@update_user_name');
Route::post("/user/update_user_email", 'UserController@update_user_email');
Route::get("/user/delete_user", 'UserController@delete_user');
Route::post('/user/reset_user_pw', 'UserController@reset_user_pw');

