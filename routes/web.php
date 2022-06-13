<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\SalesController;

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
Route::get('/company/register', [App\Http\Controllers\WebsiteController::class, 'register']);
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
Route::post('registration/search-sub-service',[RegisterController::class,'searchSubCategory'])->name('registration.searchsubcategory');
Route::post('registration/search-alpha-service', [RegisterController::class,'searchAlphaCategory'])->name('registration.searchalphacategory');
Route::post('registration/get-subservice', [RegisterController::class,'getSubCategory'])->name('registration.getSubCategory');
Route::post('registration/save-subservice', [RegisterController::class,'saveCategory'])->name('registration.saveCategory');
Route::get('registration-make-payment', [RegisterController::class,'makePayment'])->name('registration.makePayment');
Route::get('registration-download-application', [RegisterController::class,'downloadApplication'])->name('registration.downloadApplication');
Route::post('registration/payment-upload-save',  [RegisterController::class,'paymentUploadSave'])->name('registration.paymentUploadSave');
Route::post('registration/payment-refernce-save',  [RegisterController::class,'paymentTransferSave'])->name('registration.paymentTransferSave');
Route::get('registration-registration-completed', [RegisterController::class,'registrationSuccess'])->name('registration.registrationSuccess');
Route::get('registration/delete-document/{id}',  [RegisterController::class,'deleteDocument'])->name('registration.deleteDocument');
Route::post('registration/delete-category',  [RegisterController::class,'deleteCategory'])->name('registration.deleteCategory');

Route::get('registration/{token}',  [RegisterController::class,'registrationProcess'])->name('registration');
Route::get('onboarding/{token}',  [RegisterController::class,'onboarding'])->name('onboarding');
Route::post('registration',  [RegisterController::class,'setPassword'])->name('registration.setPassword');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');

Route::get('/procurement/inbox/show/{id}', [App\Http\Controllers\HomeController::class, 'proInboxBoxShow'])->name('procurement.inbox.show');


Route::get('/procurement/outbox/show/{id}', [App\Http\Controllers\HomeController::class, 'proOutBoxShow'])->name('procurement.outbox.show');



Route::get('/sales/inbox/show/{id}', [App\Http\Controllers\HomeController::class, 'salesInboxBoxShow'])->name('sales.inbox.show');

Route::get('/sales/outbox', [App\Http\Controllers\HomeController::class, 'salesOutBox'])->name('sales.outbox');
Route::get('/sales/outbox/show/{id}', [App\Http\Controllers\HomeController::class, 'salesOutBoxShow'])->name('sales.outbox.show');
Route::get('/sales/enquiry-timeout', [App\Http\Controllers\HomeController::class, 'salesEnquiryTimeout'])->name('sales.enquiry-timeout');
Route::get('/sales/enquiry-timeout/show/{id}', [App\Http\Controllers\HomeController::class, 'salesEnquiryTimeoutShow'])->name('sales.enquiry-timeout.show');

Route::get('/staff/{role}', [StaffController::class,'index'])->name('staff.index');
Route::post('/staff/store', [StaffController::class,'store'])->name('staff.store');
Route::get('/staff/edit/{id}', [StaffController::class,'edit'])->name('staff.edit');
Route::put('/staff/update/{id}', [StaffController::class,'update'])->name('staff.update');


Route::post('/user/getParent', 'User\HomeController@getParent')->name('getParent');
Route::post('/user/getSubCategory', 'User\HomeController@getSubCategory')->name('getSubCategory');
Route::post('/user/getRegion', [App\Http\Controllers\HomeController::class,'getRegion'])->name('getRegion');
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


Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'profileSave'])->name('profile.save');
Route::get('/profile/business-category', [ProfileController::class, 'profileCategories'])->name('profile.categories');

Route::get('/profile/edit/dp', [ProfileController::class, 'changeDp'])->name('profile.change-dp');

Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');



// Procurement 
   
Route::get('/procurement/home', [App\Http\Controllers\HomeController::class, 'procurement'])->name('procurement.home');
Route::get('/procurement/inbox', [ProcurementController::class, 'inbox'])->name('procurement.inbox');
Route::get('/procurement/outbox', [ProcurementController::class, 'proOutBox'])->name('procurement.outbox');
Route::get('/procurement/draft', [ProcurementController::class, 'proDraft'])->name('procurement.draft');
Route::get('/procurement/compose-select-category', [ProcurementController::class, 'composeOne'])->name('procurement.compose-one');
Route::get('/procurement/compose', [ProcurementController::class, 'composeTwo'])->name('procurement.compose-two');
Route::post('/procurement/send-mail', [ProcurementController::class, 'sendMail'])->name('procurement.send');
Route::get('/procurement/draft/edit/{id}', [ProcurementController::class, 'proDraftShow'])->name('procurement.draft.show');
Route::post('/procurement/send-draft/{id}', [ProcurementController::class, 'saveDraft'])->name('procurement.send.draft');
Route::get('/procurement/events', [ProcurementController::class, 'events'])->name('procurement.events');
Route::post('/procurement/mail/read',[ProcurementController::class,'getMailContent'])->name('procurement.getMailContent');
Route::get('/procurement/outbox/edit-timeframe/{id}', [ProcurementController::class, 'editTimeFrame'])->name('procurement.outbox.edit-timeframe');
Route::post('/procurement/outbox/update-timeframe', [ProcurementController::class, 'updateTimeFrame'])->name('procurement.outbox.update-timeframe');
Route::get('/procurement/inbox/show/{id}', [ProcurementController::class, 'proInboxBoxShow'])->name('procurement.inbox.show');


// Sales
Route::get('/sales/home', [App\Http\Controllers\HomeController::class, 'sales'])->name('sales.home');
Route::get('/sales/inbox', [SalesController::class, 'inbox'])->name('sales.inbox');
Route::get('/sales/outbox', [SalesController::class, 'outbox'])->name('sales.outbox');
Route::get('/sales/draft', [SalesController::class, 'draft'])->name('sales.draft');
Route::get('/sales/events', [SalesController::class, 'events'])->name('sales.events');
Route::get('/sales/enquiry-timeout', [SalesController::class, 'salesEnquiryTimeout'])->name('sales.enquiry-timeout');
Route::get('/sales/compose-mail/{id}', [SalesController::class, 'composeReply'])->name('sales.composereply');
Route::get('/sales/draft/edit/{id}', [SalesController::class, 'editDraft'])->name('sales.editDraft');
Route::post('/sales/send-mail', [SalesController::class, 'sendReply'])->name('sales.sendreply');