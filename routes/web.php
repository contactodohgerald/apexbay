<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ad\AdController; 
use App\Http\Controllers\Ad\AdControllerHandler; 
use App\Http\Controllers\Subscription\SubscribeController;  
use App\Http\Controllers\AppSettings\AppSettingsController;  
use App\Http\Controllers\Ad\ProductCommentController; 
use App\Http\Controllers\BoostAd\BoostAdController; 
use App\Http\Controllers\BoostAd\BoostCvController; 
use App\Http\Controllers\User\UsersController; 
use App\Http\Controllers\User\UserControllerHandler;
use App\Http\Controllers\CVs\CVsController;    
use App\Http\Controllers\CVs\CVControllerHandler;    
use App\Http\Controllers\Payment\PaymentController;  
use App\Http\Controllers\Result\SearchQueryController; 

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/about-us', function () {
    return view('front_end.about_us');
})->name('about-us');

//front-end
Route::group(['middleware' => 'web'], function () {
    Route::get('/', [AdControllerHandler::class, 'indexPage'])->name('/'); 
    Route::get('/create-ad', [AdControllerHandler::class, 'createAd'])->name('create-ad'); 
    Route::get('/ad-file-upload/{unique_id?}', [AdControllerHandler::class, 'adFileInterface'])->name('ad-file-upload'); 
    Route::post('/store-ad', [AdControllerHandler::class, 'storeAdPost'])->name('store-ad')->middleware('auth');
    Route::post('/store-files/{unique_id?}', [AdControllerHandler::class, 'uploadAdFiles'])->name('store-files');
    
    
    Route::get('/pricing', [SubscribeController::class, 'premuimSubscribe'])->name('pricing');  
    Route::get('/product-activation/{unique_id?}', [SubscribeController::class, 'checkOutPage'])->name('product-activation');  
    Route::get('/cv-activation/{unique_id?}', [SubscribeController::class, 'cvCheckOutPage'])->name('cv-activation');  
    
    Route::get('/boost-ad', [BoostAdController::class, 'boostAdPage'])->name('boost-ad');  

    Route::get('/boost-cv', [BoostCvController::class, 'boostCvPage'])->name('boost-cv');  

    Route::get('/app-settings', [AppSettingsController::class, 'appSettingsInterface'])->name('app-settings');  
    Route::get('/store-settings', [AppSettingsController::class, 'storeSettings'])->name('store-settings');   
    Route::post('/update-settings', [AppSettingsController::class, 'updateAppsettings'])->name('update-settings'); 

    
    Route::get('/ad-details/{unique_id?}', [AdControllerHandler::class, 'productDetails'])->name('ad-details'); 
    Route::get('/preview-product/{unique_id?}', [AdControllerHandler::class, 'previewProductDetails'])->name('preview-product'); 

    //cvs details page
    Route::get('/cv-details/{unique_id?}', [CVsController::class, 'cvDetailsInterface'])->name('cv-details'); 
    Route::get('/preview-cv/{unique_id?}', [CVsController::class, 'previewCVDetailPage'])->name('preview-cv'); 
    

    Route::post('/post-comment/{unique_id?}', [ProductCommentController::class, 'storeProductComment'])->name('post-comment')->middleware('auth');

    Route::post('/post-cv-comment/{unique_id?}', [ProductCommentController::class, 'storeCvComment'])->name('post-cv-comment')->middleware('auth');

    Route::get('/profile', [UsersController::class, 'profilePage'])->name('profile')->middleware('auth');   
    Route::get('/edit-user-profile', [UsersController::class, 'editUserProfilePage'])->name('edit-user-profile')->middleware('auth');   

    Route::post('/update-image', [UsersController::class, 'updateUserImage'])->name('update-image')->middleware('auth');   

    Route::post('/background-update', [UsersController::class, 'updateUserBackgroundImage'])->name('background-update')->middleware('auth');   

    Route::post('/store-cv', [CVsController::class, 'storeCv'])->name('store-cv')->middleware('auth'); 

    Route::get('/search-query', [SearchQueryController::class, 'searchThroughTable'])->name('search-query');   
    Route::post('/search-query', [SearchQueryController::class, 'searchThroughTable'])->name('search-query');   
    
}); 

//back-end
Route::group(['middleware' => 'web'], function () {
    
    Route::get('/profile-page', [UserControllerHandler::class, 'profilePage'])->name('profile-page');  
    Route::get('/admin-profile-page/{unique_id?}', [UserControllerHandler::class, 'adminProfilePage'])->name('admin-profile-page');  
    Route::get('/edit-profile', [UserControllerHandler::class, 'editProfilePage'])->name('edit-profile');  
    Route::get('/index', [UserControllerHandler::class, 'dashboardInterface'])->name('index');  
    Route::get('/create-category', [AdController::class, 'createAdCategory'])->name('create-category');  
    Route::get('/create-cv-category', [CVControllerHandler::class, 'createCvCategory'])->name('create-cv-category');  
    Route::get('/list-category', [AdController::class, 'allAdCategory'])->name('list-category'); 
    Route::get('/list-cv-category', [CVControllerHandler::class, 'allCvCategory'])->name('list-cv-category'); 
    Route::get('/confirm-ads', [AdController::class, 'confirmAdsInterface'])->name('confirm-ads'); 
    Route::get('/all-products', [AdController::class, 'getAllproducts'])->name('all-products'); 
    Route::get('/edit-category/{unique_id?}', [AdController::class, 'singleAdCategory'])->name('edit-category');
    Route::get('/product-counter/{unique_id?}', [AdController::class, 'productCounter'])->name('product-counter');
    Route::get('/edit-cv-category/{unique_id?}', [CVControllerHandler::class, 'singleCvCategory'])->name('edit-cv-category');
    Route::post('/store-category', [AdController::class, 'storeAdCategory'])->name('store-category');
    Route::post('/store-cv-category', [CVControllerHandler::class, 'storeCvCategory'])->name('store-cv-category');
    Route::post('/update-category/{unique_id?}', [AdController::class, 'updateAdCategory'])->name('update-category');
    Route::post('/update-cv-category/{unique_id?}', [CVControllerHandler::class, 'updateCvCategory'])->name('update-cv-category');

    Route::get('/add-admin', [UserControllerHandler::class, 'createAdminInterface'])->name('add-admin');  
    Route::post('/store-admin', [UserControllerHandler::class, 'createAdminAccount'])->name('store-admin');  
    Route::get('/admin-list', [UserControllerHandler::class, 'adminLists'])->name('admin-list');  
    Route::get('/user-list', [UserControllerHandler::class, 'userLists'])->name('user-list'); 
    Route::post('/update-profile', [UserControllerHandler::class, 'updateAccount'])->name('update-profile'); 
    Route::post('/update-password', [UserControllerHandler::class, 'userPasswordUpdate'])->name('update-password'); 

    Route::get('/comfirm-cvs', [CVsController::class, 'viewCvInterface'])->name('comfirm-cvs'); 
    Route::get('/all-cvs', [CVsController::class, 'getAllCvs'])->name('all-cvs'); 
    Route::get('/cv-counter/{unique_id?}', [CVsController::class, 'cvCounter'])->name('cv-counter');

    Route::get('/product-transactions', [SubscribeController::class, 'transactionPage'])->name('product-transactions'); 
    Route::get('/cv-transactions', [SubscribeController::class, 'cvTransactionPage'])->name('cv-transactions'); 


    Route::get('/create-boost-ads', [BoostAdController::class, 'createBoostAdInterface'])->name('create-boost-ads'); 
    Route::get('/all-boost-ads', [BoostAdController::class, 'getAllBoostedAds'])->name('all-boost-ads'); 
    Route::post('/add-boost-ads', [BoostAdController::class, 'addBoostedAds'])->name('add-boost-ads'); 

    Route::get('/create-boost-cvs', [BoostCvController::class, 'createBoostCvInterface'])->name('create-boost-cvs'); 
    Route::get('/all-boost-cvs', [BoostCvController::class, 'getAllBoostedCvs'])->name('all-boost-cvs'); 
    Route::post('/add-boost-cvs', [BoostCvController::class, 'addBoostedCvs'])->name('add-boost-cvs'); 
    
    
});

// Laravel 5.1.17 and above
//Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');  

//Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']); 

require __DIR__.'/auth.php';
