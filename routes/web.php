<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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
Route::get('registration/payment-upload',  'Company\RegistrationController@paymentUpload')->name('registration.paymentUpload');
Route::get('registration/delete-document/{id}',  [RegisterController::class,'deleteDocument'])->name('registration.deleteDocument');

Route::get('registration/{token}',  [RegisterController::class,'registrationProcess'])->name('registration');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
