<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*
|--------------------------------------------------------------------------
| Controllers path  
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Generalcontroller;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//auth api's route
Route::get('states-list/{country_id}', [Generalcontroller::class, 'statesList']);
Route::get('countries-list', [Generalcontroller::class, 'countriesList']);
Route::post('login', [Generalcontroller::class, 'login']);
Route::post('signup', [Generalcontroller::class, 'signup']);
Route::get('account/verify/{token}', [Generalcontroller::class, 'verifyUser'])->name('user.verify');
Route::post('sendForgetPasswordLink', [Generalcontroller::class, 'sendForgetPasswordLink']);
Route::get('changePassword/{token?}', [Generalcontroller::class, 'changePasswordGet'])->name('user.changepassword.get');
Route::post('changePassword', [Generalcontroller::class, 'changePasswordPost'])->name('user.changepassword.post');

//subscriptions apis
Route::post('check-subscriptions',[Generalcontroller::class, 'checkSubscription']);
Route::get('subscriptions-list',[Generalcontroller::class, 'subscriptionsList']);
Route::post('buy-subscriptions',[Generalcontroller::class, 'buySubscription']);
Route::post('pay-subscriptions',[Generalcontroller::class, 'paySubscription']);