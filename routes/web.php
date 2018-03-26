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

Route::get('document/{id}/delete', 'DocumentController@delete')->name('document.delete');
Route::post('document/{id}/delete-post', 'DocumentController@deletePost')->name('document.delete-post');
Route::get('document/{id}/edit', 'DocumentController@edit')->name('document.edit');

Auth::routes();