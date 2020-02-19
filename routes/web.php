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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->where('path','.*');
Route::get('/post', 'PostController@all_post')->name('post');

// for category

Route::post('/add_category','CategoryController@add_category');
Route::post('/update_category/{id}','CategoryController@update_category');
Route::get('/category','CategoryController@all_category');
Route::get('/delete_category/{id}','CategoryController@delete_category');
Route::get('/pagination','CategoryController@all_pagination');
Route::get('/editCategory/{id}','CategoryController@edit_category');

// for post

Route::post('/add_post','PostController@add_post');
Route::post('/post_category/{id}','PostController@update_post');
Route::get('/post','PostController@all_post');
Route::get('/delete_post/{id}','PostController@delete_post');
Route::get('/editPost/{id}','PostController@edit_post');
