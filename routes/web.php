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
    return view('home');
})->name('home');

Route::get('form', 'PersonController@form');
Route::get('documents', 'PersonController@documentsIndex');
Route::post('person/documents/create', 'PersonController@documentsCreate')->name('person.documents.create');

Auth::routes();