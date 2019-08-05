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

Route::get('/category', 'CategoryController@index');

//insert data
Route::get('/category/create', 'CategoryController@create');
Route::post('/category/create', 'CategoryController@store');   

//update data
Route::get('/category/{id}/edit', 'CategoryController@edit');
Route::put('/category/{id}/edit', 'CategoryController@update'); 

//delete data
Route::delete('/category/{id}', 'CategoryController@destroy'); 

// membuat route global
Route::resource('product', 'ProductController');

// route untuk export file
Route::get('product-export', 'ProductController@export');

// route untuk import file
Route::post('product-import', 'ProductController@import');
Route::resource('posts', 'PostsController');