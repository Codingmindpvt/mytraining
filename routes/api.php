<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DummyApiController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;

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










