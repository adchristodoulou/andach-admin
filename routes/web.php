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

/********************
* HR ROUTES
********************/

Route::get('ajax/authsalariesform/{id}', 'AjaxController@authSalariesForm')->name('ajax.authsalariesform');
Route::get('ajax/costcodeselect/bankaccount/{id}', 'AjaxController@costCodeSelectBankAccount')->name('ajax.costcodeselectbankaccount');
Route::get('ajax/costcodeselect/fixedassetcategory/{id}', 'AjaxController@costCodeSelectFixedAssetCategory')->name('ajax.costcodeselectfixedassetcategory');
Route::get('ajax/costcodeselect/purchaseledger/{id}', 'AjaxController@costCodeSelectPurchaseLedger')->name('ajax.costcodeselectpurchaseledger');
Route::get('ajax/costcodeselect/salesledger/{id}', 'AjaxController@costCodeSelectSalesLedger')->name('ajax.costcodeselectsalesledger');
Route::get('ajax/costcodeselect/stockledger/{id}', 'AjaxController@costCodeSelectStockLedger')->name('ajax.costcodeselectstockledger');
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

/********************
* FINANCE ROUTES
********************/

Route::get('deliverynote', 'DeliveryNoteController@index')->name('deliverynote.index');
Route::get('deliverynote/create', 'DeliveryNoteController@create')->name('deliverynote.create');
Route::get('deliverynote/edit/{id}', 'DeliveryNoteController@edit')->name('deliverynote.edit');
Route::get('deliverynote/show/{id}', 'DeliveryNoteController@show')->name('deliverynote.show');
Route::post('deliverynote/store', 'DeliveryNoteController@store')->name('deliverynote.store');
Route::post('deliverynote/update', 'DeliveryNoteController@update')->name('deliverynote.update');

Route::get('product', 'ProductController@index')->name('product.index');
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::get('product/show/{id}', 'ProductController@show')->name('product.show');
Route::post('product/store', 'ProductController@store')->name('product.store');
Route::post('product/update', 'ProductController@update')->name('product.update');

Route::get('purchaseinvoice', 'PurchaseInvoiceController@index')->name('purchaseinvoice.index');
Route::get('purchaseinvoice/create', 'PurchaseInvoiceController@create')->name('purchaseinvoice.create');
Route::get('purchaseinvoice/edit/{id}', 'PurchaseInvoiceController@edit')->name('purchaseinvoice.edit');
Route::get('purchaseinvoice/show/{id}', 'PurchaseInvoiceController@show')->name('purchaseinvoice.show');
Route::post('purchaseinvoice/store', 'PurchaseInvoiceController@store')->name('purchaseinvoice.store');
Route::post('purchaseinvoice/update', 'PurchaseInvoiceController@update')->name('purchaseinvoice.update');

Auth::routes();