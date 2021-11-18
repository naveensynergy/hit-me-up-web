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
Route::get('/signup',  [authController::class, 'SignUp']);
Route::post('/store-business',  [authController::class, 'storeBusiness']);
Route::get('account/verify/{token}', [authController::class, 'verifyBusiness'])->name('business.verify');
Route::post('admin/get-states', [adminController::class, 'getStates']);
Route::post('admin/get-categories', [adminController::class, 'getCategories']);
Route::post('/business-signup-process',  [businessController::class, 'businessSignUpProcess']);
/*
|--------------------------------------------------------------------------
| Dashboard  
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    // Business Module Start
    Route::get('/dashboard', [adminController::class, 'dash_index']);
    Route::get('/businesses', [adminController::class, 'businessesList']);
    Route::get('/add-business', [adminController::class, 'addBusiness']);
    Route::post('/store-business', [adminController::class, 'storeBusiness']);
    Route::get('/business-edit/{id}', [adminController::class, 'businessEdit']);
    Route::post('/business-update/{id}', [adminController::class, 'businessUpdate']);
    Route::get('/business-view/{id}', [adminController::class, 'businessView']);
    Route::get('/business-delete/{id}', [adminController::class, 'businessDelete']);

    // Category Module Start
    Route::get('/categories', [adminController::class, 'categories']);
    Route::get('/add-category', [adminController::class, 'addCategory']);
    Route::post('/store-category', [adminController::class, 'storeCategory']);
    Route::get('/edit-category/{cat_id}', [adminController::class, 'editCategory']);
    Route::post('/update-category/{cat_id}', [adminController::class, 'updateCategory']);
    Route::get('/delete-category/{cat_id}', [adminController::class, 'deleteCategory']);

    // Promotions by Admin Module Start
    Route::get('/promotions', [adminController::class, 'promotions']);
    Route::get('/add-promotion', [adminController::class, 'addPromotion']);
    Route::post('/store-promotion', [adminController::class, 'storePromotion']);
    Route::get('/edit-promotion/{id}', [adminController::class, 'editPromotion']);
    Route::post('/update-promotion/{id}', [adminController::class, 'updatePromotion']);
    Route::get('/view-promotion/{id}', [adminController::class, 'viewPromotion']);
    Route::get('/delete-promotion/{id}', [adminController::class, 'deletePromotion']);
});
Route::group(['prefix' => 'business', 'middleware' => 'business'], function () {

    // Promotions by Business Module Start
    Route::get('/dashboard', [businessController::class, 'dash_index']);
    Route::get('/promotions', [businessController::class, 'promotions']);
    Route::get('/add-promotion', [businessController::class, 'addPromotion']);
    Route::post('/store-promotion', [businessController::class, 'storePromotion']);
    Route::get('/edit-promotion/{id}', [businessController::class, 'editPromotion']);
    Route::post('/update-promotion/{id}', [businessController::class, 'updatePromotion']);
    Route::get('/view-promotion/{id}', [businessController::class, 'viewPromotion']);
    Route::get('/delete-promotion/{id}', [businessController::class, 'deletePromotion']);
    // Route::get('/list', [businessController::class, 'businessOwnerList']);
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
