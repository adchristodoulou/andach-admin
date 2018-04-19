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
Route::post('document/edit-post', 'DocumentController@editPost')->name('document.edit-post');

Route::get('company', 'CompanyController@index')->name('company.index');
Route::get('contract', 'ContractController@index')->name('contract.index');
Route::get('costcode', 'CostCodeController@index')->name('costcode.index');
Route::get('job', 'JobController@index')->name('job.index');
Route::get('jobgrade', 'JobGradeController@index')->name('jobgrade.index');
Route::get('position', 'PositionController@index')->name('position.index');
Route::get('reportingunit', 'ReportingUnitController@index')->name('reportingunit.index');
Route::get('reportingunitarea', 'ReportingUnitAreaController@index')->name('reportingunitarea.index');

Auth::routes();