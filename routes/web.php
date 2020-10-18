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
    return redirect('/post');
});
// public post
Route::get('/post', 'PostController@index')->name('post.list');
Route::get('/post/{post}', 'PostController@detail')->name('post.detail');
Route::get('/user', 'UserController@list')->name('user.list');
Route::get('/guest/comment', 'CommentController@guest')->name('comment.guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
