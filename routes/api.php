<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DummyApiController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ApiController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("data",[DummyApiController::class,'getData']);
Route::get("list",[DeviceController::class,'list']);
Route::get("list/{id}",[DeviceController::class,'single_data']);
Route::get("optionallist/{id?}",[DeviceController::class,'find_data_optional']);

Route::get("optionallist/{id?}",[DeviceController::class,'find_data_withparam']);
// Route::get("list-with-param/{id}",[DeviceController::class,'find_data_withparam']);
Route::post("add",[DeviceController::class,'add']);
Route::put("update",[DeviceController::class,'update']);
Route::get("search/{name}",[DeviceController::class,'search']);
Route::delete("delete/{id}",[DeviceController::class,'delete']);
Route::post("add_form_validation",[DeviceController::class,'add_form_validation']);

Route::apiResource("member",MemberController::class);

Route::post("login",[UserController::class,'index']);
Route::post("upload",[FileController::class,'upload']);

//Advanced
//get api for fetch single users
Route::get('/users/{id?}', [ApiController::class, 'users']);

//secure get api for fetch users
Route::get('/users-list', [ApiController::class, 'usersList']);//not done

//post api for add single user
Route::post('/add-users', [ApiController::class, 'addUsers']);

//register api to add single user with api token
Route::post('/register-users', [ApiController::class, 'registerUsers']);//not check

//user login api /update token
Route::post('/login-users', [ApiController::class, 'loginUsers']);//not check

//user logout api /update token
Route::post('/logout-users', [ApiController::class, 'logoutUsers']);//not check

//post api for add multiple user
Route::post('/add-multiple-users', [ApiController::class, 'addMultipleUsers']);

//put api for update one or more records
Route::put('/update-user-details/{id}', [ApiController::class, 'updateUserDetails']);

//patch api for update single records
Route::patch('/update-user-name/{id}', [ApiController::class, 'updateUserName']);//not check

//delete user with param
Route::delete('/delete-user/{id}', [ApiController::class, 'deleteUser']);

//delete user with json
Route::delete('/delete-user-with-json', [ApiController::class, 'deleteUserWithJson']);

//delete multiple user with param
Route::delete('/delete-multiple-user/{ids}', [ApiController::class, 'deleteMultipleUser']);

//delete multiple user with json
Route::delete('/delete-multiple-user-with-json', [ApiController::class, 'deleteMultipleUserWithJson']);


//register user with passport
Route::post('/register-user-with-passport',[ApiController::class,'registerWithPassport']);//not check










