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

Route::get('ajax/authsalariesform/{id}', 'AjaxController@authSalariesForm')->name('ajax.authsalariesform');
Route::get('ajax/gradeselect/{id}', 'AjaxController@gradeSelect')->name('ajax.gradeselect');
Route::get('ajax/jobselect/{id}', 'AjaxController@jobSelect')->name('ajax.jobselect');
Route::get('ajax/reportingunitareaselect/{id}', 'AjaxController@reportingUnitAreaSelect')->name('ajax.reportingunitareaselect');
Route::get('ajax/reportingunitselect/{id}', 'AjaxController@reportingUnitSelect')->name('ajax.reportingunitselect');

Route::get('company', 'CompanyController@index')->name('company.index');

Route::get('contract', 'ContractController@index')->name('contract.index');
Route::get('contract/create', 'ContractController@create')->name('contract.create');
Route::get('contract/edit/{id}', 'ContractController@edit')->name('contract.edit');
Route::post('contract/store', 'ContractController@store')->name('contract.store');
Route::post('contract/update', 'ContractController@update')->name('contract.update');

Route::get('costcode', 'CostCodeController@index')->name('costcode.index');

Route::get('job', 'JobController@index')->name('job.index');
Route::get('job/create', 'JobController@create')->name('job.create');
Route::get('job/edit/{id}', 'JobController@edit')->name('job.edit');
Route::post('job/store', 'JobController@store')->name('job.store');
Route::post('job/update', 'JobController@update')->name('job.update');

Route::get('jobgrade', 'JobGradeController@index')->name('jobgrade.index');

Route::get('position', 'PositionController@index')->name('position.index');
Route::get('position/complete/{date}', 'PositionController@complete')->name('position.complete');
Route::post('position/store', 'PositionController@store')->name('position.store');

Route::get('reportingunit', 'ReportingUnitController@index')->name('reportingunit.index');
Route::get('reportingunitarea', 'ReportingUnitAreaController@index')->name('reportingunitarea.index');

Auth::routes();