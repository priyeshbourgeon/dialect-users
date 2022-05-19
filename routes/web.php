<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StaffController;


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

Route::get('/', [App\Http\Controllers\WebsiteController::class, 'index']);
Route::post('registrations', [RegisterController::class,'registration'])->name('registrations');
Route::get('registration-otp', [RegisterController::class,'registrationOtp'])->name('registration.otp');
Route::post('register-verify-otp', [RegisterController::class,'verifyOtp'])->name('registration.verifyOtp');
Route::get('registration-success', [RegisterController::class,'success'])->name('registration.success');
Route::get('registration-company-info', [RegisterController::class,'companyInfo'])->name('registration.companyInfo');
Route::post('registration-save-company-info',[RegisterController::class,'saveCompanyInfo'])->name('registration.saveCompanyInfo');
Route::get('registration-document-upload', [RegisterController::class,'documentUpload'])->name('registration.documentUpload');
Route::post('registration-save-document',[RegisterController::class,'saveDocument'])->name('registration.saveDocument');
Route::get('registration-select-services', [RegisterController::class,'selectService'])->name('registration.selectService');
Route::get('registration-save-service',[RegisterController::class,'saveService'])->name('registration.saveService');
Route::get('registration-company-activity', [RegisterController::class,'companyActivity'])->name('registration.companyActivity');
Route::post('registration/get-region', [RegisterController::class,'getRegionsByCountryId'])->name('registration.getRegion');
Route::post('registration/get-country', [RegisterController::class,'getCountryById'])->name('registration.getCountry');
Route::post('registration/search-service',[RegisterController::class,'searchCategory'])->name('registration.searchcategory');
Route::post('registration/search-alpha-service', [RegisterController::class,'searchAlphaCategory'])->name('registration.searchalphacategory');
Route::post('registration/get-subservice', [RegisterController::class,'getSubCategory'])->name('registration.getSubCategory');
Route::post('registration/save-subservice', [RegisterController::class,'saveCategory'])->name('registration.saveCategory');
Route::get('registration-make-payment', [RegisterController::class,'makePayment'])->name('registration.makePayment');
Route::get('registration-download-application', [RegisterController::class,'downloadApplication'])->name('registration.downloadApplication');
Route::post('registration/payment-upload-save',  [RegisterController::class,'paymentUploadSave'])->name('registration.paymentUploadSave');
Route::post('registration/payment-refernce-save',  [RegisterController::class,'paymentTransferSave'])->name('registration.paymentTransferSave');
Route::get('registration-registration-completed', [RegisterController::class,'registrationSuccess'])->name('registration.registrationSuccess');
Route::get('registration/delete-document/{id}',  [RegisterController::class,'deleteDocument'])->name('registration.deleteDocument');

Route::get('registration/{token}',  [RegisterController::class,'registrationProcess'])->name('registration');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');
Route::get('/procurement/home', [App\Http\Controllers\HomeController::class, 'procurement'])->name('procurement.home');
Route::get('/procurement/compose-select-category', [App\Http\Controllers\HomeController::class, 'composeOne'])->name('procurement.compose-one');
Route::get('/procurement/compose', [App\Http\Controllers\HomeController::class, 'composeTwo'])->name('procurement.compose-two');
Route::get('/sales/home', [App\Http\Controllers\HomeController::class, 'sales'])->name('sales.home');

Route::post('/staff/store', [StaffController::class,'store'])->name('staff.store');
Route::get('/staff/edit/{id}', [StaffController::class,'edit'])->name('staff.edit');
Route::put('/staff/update/{id}', [StaffController::class,'update'])->name('staff.update');


Route::post('/user/getParent', 'User\HomeController@getParent')->name('getParent');
Route::post('/user/getSubCategory', 'User\HomeController@getSubCategory')->name('getSubCategory');
Route::post('/user/getRegion', 'User\HomeController@getRegion')->name('getRegion');
Route::post('/user/getArea', 'User\HomeController@getArea')->name('getArea');

Route::post('/search-service', [App\Http\Controllers\HomeController::class, 'searchService'])->name('search.service');
Route::post('/search-alpha-service', [App\Http\Controllers\HomeController::class, 'searchAlphaService'])->name('search.alpha.service');
Route::post('/get-subservice', [App\Http\Controllers\HomeController::class, 'getSubService'])->name('getSubService');
Route::post('/save-subservice',  [App\Http\Controllers\HomeController::class,'saveMailCatService'])->name('saveMailCatService');



Route::get('/procurement-mail-inbox', 'User\Procurement\EnquiryController@index')->name('procurement.index');
Route::get('/procurement-email-view/{id}', 'User\Procurement\EnquiryController@mailView')->name('procurement.emailView');
Route::get('/procurement-mail-compose','User\Procurement\EnquiryController@composeOne')->name('procurement.create');
Route::get('/procurement-mail-edit/{id}','User\Procurement\EnquiryController@edit')->name('procurement.edit');
Route::put('/procurement-mail-update/{id}','User\Procurement\EnquiryController@update')->name('procurement.update');
Route::get('/procurement-mail-send', 'User\Procurement\EnquiryController@mailSend')->name('procurement.mailSend');
Route::get('/procurement-mail-drafts', 'User\Procurement\EnquiryController@mailDraft')->name('procurement.mailDraft');
Route::get('/procurement-mail-trash', 'User\Procurement\EnquiryController@mailTrash')->name('procurement.mailTrash');
Route::get('/procurement-mail-pending', 'User\Procurement\EnquiryController@mailPending')->name('procurement.mailPending');
Route::post('procurement-mail-save', 'User\Procurement\EnquiryController@store')->name('procurement.mailSave');

