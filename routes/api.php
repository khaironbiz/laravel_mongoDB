<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\ObservationController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/notAuthorized',[AuthController::class,'notAuthorised'])->name('notAuthorised');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth:sanctum');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::resource('/education', EducationController::class);
Route::resource('/users', UserController::class)->middleware('auth:sanctum');
Route::resource('/customers', CustomerController::class);
Route::resource('/observations', ObservationController::class);
Route::post('/observation/HeartRate',[ObservationController::class, 'storeHeartRate'] );
Route::post('/observation/RespiratoryRate',[ObservationController::class, 'storeRespiratoryRate'] );

