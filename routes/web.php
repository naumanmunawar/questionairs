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

//questionairs
Route::get('/questionairs/create', 'QuestionairController@create');
Route::post('/questionairs/create', 'QuestionairController@store');
Route::get('/questionairs/', 'QuestionairController@index');
Route::get('/questionairs/{id}', 'QuestionairController@approve');
Route::get('/questionairs/edit/{id}', 'QuestionairController@edit');
Route::post('/questionairs/edit/{id}', 'QuestionairController@update');

Route::get('/questionairs/delete/{id}', 'QuestionairController@delete');

//add questionair
Route::get('/questionairs/add/{id}', 'QuestionairController@add');
Route::post('/question/store', 'QuestionairController@storeQuestion');