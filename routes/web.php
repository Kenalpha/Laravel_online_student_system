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

Route::get('/', 'StudentsController@index');

Route::get('/student', 'StudentsController@display_student');

Route::get('/levels', 'StudentsController@display_levels');

Route::post('/addStudent', 'StudentsController@addStudent');

Route::post('/addLevel', 'StudentsController@addLevel');

Route::get('/links/{id}', 'StudentsController@links_display');

Route::get('/delete', 'StudentsController@destroy')->name('site.home');