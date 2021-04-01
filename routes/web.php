<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ad\AdController; 
use App\Http\Controllers\Ad\AdControllerHandler; 
use App\Http\Controllers\Subscription\SubscribeController;  
use App\Http\Controllers\AppSettings\AppSettingsController;  
use App\Http\Controllers\Ad\ProductCommentController; 
use App\Http\Controllers\User\UsersController; 
use App\Http\Controllers\User\UserControllerHandler;
use App\Http\Controllers\CVs\CVsController;    
use App\Http\Controllers\Payment\PaymentController;  

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

    Route::post('/update-image', [UsersController::class, 'updateUserImage'])->name('update-image')->middleware('auth');   

    Route::post('/background-update', [UsersController::class, 'updateUserBackgroundImage'])->name('background-update')->middleware('auth');   

    Route::post('/store-cv', [CVsController::class, 'storeCv'])->name('store-cv')->middleware('auth'); 

    
}); 

//back-end
Route::group(['middleware' => 'web'], function () {
    
    Route::get('/index', [UserControllerHandler::class, 'dashboardInterface'])->name('index');  
    Route::get('/create-category', [AdController::class, 'createAdCategory'])->name('create-category');  
    Route::get('/list-category', [AdController::class, 'allAdCategory'])->name('list-category'); 
    Route::get('/confirm-ads', [AdController::class, 'confirmAdsInterface'])->name('confirm-ads'); 
    Route::get('/edit-category/{unique_id?}', [AdController::class, 'singleAdCategory'])->name('edit-category');
    Route::post('/store-category', [AdController::class, 'storeAdCategory'])->name('store-category');
    Route::post('/update-category/{unique_id?}', [AdController::class, 'updateAdCategory'])->name('update-category');

    Route::get('/add-admin', [UserControllerHandler::class, 'createAdminInterface'])->name('add-admin');  
    Route::post('/store-admin', [UserControllerHandler::class, 'createAdminAccount'])->name('store-admin');  
    Route::get('/admin-list', [UserControllerHandler::class, 'adminLists'])->name('admin-list');  
    Route::get('/user-list', [UserControllerHandler::class, 'userLists'])->name('user-list'); 

    Route::get('/comfirm-cvs', [CVsController::class, 'viewCvInterface'])->name('comfirm-cvs'); 

    Route::get('/product-transactions', [SubscribeController::class, 'transactionPage'])->name('product-transactions'); 
    Route::get('/cv-transactions', [SubscribeController::class, 'cvTransactionPage'])->name('cv-transactions'); 
    
    
});

// Laravel 5.1.17 and above
//Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');  

//Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']); 

require __DIR__.'/auth.php';