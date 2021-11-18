<?php

use Illuminate\Support\Facades\Route;

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

/*
|--------------------------------------------------------------------------
| Controllers path  
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Generalcontroller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\authController;
use App\Http\Controllers\businessController;
use App\Http\Controllers\adminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [authController::class, 'login']);
Route::post('/loginpost', [authController::class, 'loginpost']);
Route::get('/logout',  [authController::class, 'logout']);
Route::get('/business-sign-up',  [businessController::class, 'businessSignUp']);
Route::post('/business-signup-process',  [businessController::class, 'businessSignUpProcess']);
/*
|--------------------------------------------------------------------------
| Dashboard  
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', [adminController::class, 'dash_index']);
});
Route::group(['prefix' => 'business', 'middleware' => 'business'], function () {
    Route::get('/dashboard', [businessController::class, 'dash_index']);
    Route::get('/list', [businessController::class, 'businessOwnerList']);
});
// Route::get('submitVote', [UserController::class, 'submitVote']);



// Route::get('lo', [UserController::class, 'loginpage']);
// Route::post('account/login', [UserController::class, 'login']);
// Route::get('/logout',  [UserController::class, 'logout']);

// Route::group(['middleware'=>'admin'], function(){
// 	Route::get('/dashboard', [UserController::class, 'dashboard']);

// 	//Users Management
// 	Route::get('/option_management', [UserController::class, 'option_management']);
// 	Route::get('/add_option', [UserController::class, 'addOption']);
// 	Route::post('/insert_option', [UserController::class, 'insertOption']);
// 	Route::get('/edit_option/{option_id}', [UserController::class, 'editOption']);
// 	Route::post('/update_option', [UserController::class, 'updateOption']);
// 	Route::get('/delete_option/{id}', [UserController::class, 'statusUser']);
// });
