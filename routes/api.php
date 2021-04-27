<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ad\AdController;  
use App\Http\Controllers\CVs\CVsController;  
use App\Http\Controllers\User\UserControllerHandler; 
use App\Http\Controllers\BoostAd\BoostAdController; 
use App\Http\Controllers\BoostAd\BoostCvController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/comfirmAdsStatus', [AdController::class, 'comfirmAdsStatus'])->name('comfirmAdsStatus'); 

Route::post('/deleteAdsStatus', [AdController::class, 'deleteAdsStatus'])->name('deleteAdsStatus');  

Route::post('/comfirmCvsStatus', [CVsController::class, 'comfirmCvsStatus'])->name('comfirmCvsStatus');  

Route::post('/deleteCvsStatus', [CVsController::class, 'deleteCvsStatus'])->name('deleteCvsStatus');

Route::post('/deleteUsers', [UserControllerHandler::class, 'deleteUsers'])->name('deleteUsers');   

Route::post('/deleteTransaction', [SubscribeController::class, 'deleteTransaction'])->name('deleteTransaction');  

Route::post('/deleteBoostAds', [BoostAdController::class, 'deleteBoostAds'])->name('deleteBoostAds');

Route::post('/updeteBoostAdsStatus', [BoostAdController::class, 'updeteBoostAdsStatus'])->name('updeteBoostAdsStatus');

Route::post('/deleteBoostCvs', [BoostCvController::class, 'deleteBoostCvs'])->name('deleteBoostCvs');

Route::post('/updeteBoostCvsStatus', [BoostCvController::class, 'updeteBoostCvsStatus'])->name('updeteBoostCvsStatus');


