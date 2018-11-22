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


Route::get('/', 'PostController@getIndex')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/author/post', 'HomeController@getPostForm')->name('post.form');
Route::post('/author/post', 'HomeController@createPost')->name('post.form');
Route::get('/author/post/detail/{id}', 'HomeController@getPost')->name('post.detail');
Route::get('/author/post/edit/{id}', 'HomeController@editPost')->name('post.edit');
Route::post('/author/post/edit/{id}', 'HomeController@updatePost')->name('post.update');
Route::get('/author/post/delete/{id}', 'HomeController@deletePost')->name('post.delete');
Route::get('/post/read/{post_id}', 'PostController@getFullPost')->name('post.read');


Route::group(['middleware' => 'auth'], function() {

    Route::get('admin', 'AdminController@index')->name('admin');

    Route::get('admin/post/create', 'PostController@create')->name('post-create');    
    Route::post('admin/post/store', 'PostController@store')->name('post-store');

    Route::get('admin/post/{id}', 'PostController@update')->where('id', '[0-9]+')->name('post');
    Route::post('admin/post/{id}/edit', 'PostController@edit')->where('id', '[0-9]+')->name('post-update');

    Route::get('admin/category', 'CategoryController@index')->name('category');
    Route::post('admin/category/store', 'CategoryController@store')->name('category-store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/posts/{post}/comments', 'CommentController@store');
