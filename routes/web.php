<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Web\EthnicController;
use App\Http\Controllers\web\MaritalStatusController;
use App\Http\Controllers\Web\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('users', [UserController::class,'index'])->name('users.index');
Route::get('user', [UserController::class,'create'])->name('users.create');
Route::post('users', [UserController::class,'store'])->name('users.store');
Route::get('users/{id}', [UserController::class,'show'])->name('users.show');
Route::get('users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
Route::post('users/{id}/update', [UserController::class,'update'])->name('users.update');
Route::post('users/{id}/blokir', [UserController::class,'blokir'])->name('users.blokir');
Route::post('users/{id}/delete', [UserController::class,'destroy'])->name('users.destroy');
Route::get('users/{properti}/{value}', [UserController::class,'kode'])->name('users.kode');


Route::get('marital-status', [MaritalStatusController::class,'index'])->name('marital_status');
Route::get('marital-status/create', [MaritalStatusController::class,'create'])->name('marital_status.create');
Route::post('marital-status/store', [MaritalStatusController::class,'store'])->name('marital_status.store');
Route::get('marital-status/{id}', [MaritalStatusController::class,'show'])->name('marital_status.show');
Route::get('marital-status/{id}/edit', [MaritalStatusController::class,'edit'])->name('marital_status.edit');
Route::post('marital-status/{id}/update', [MaritalStatusController::class,'update'])->name('marital_status.update');
Route::post('marital-status/{id}/destroy', [MaritalStatusController::class,'destroy'])->name('marital_status.destroy');

Route::get('ethnics', [EthnicController::class, 'index'])->name('ethnic');
Route::get('ethnic', [EthnicController::class, 'create'])->name('ethnic.create');
Route::post('ethnic', [EthnicController::class, 'store'])->name('ethnic.store');
Route::get('ethnic/{id}/show', [EthnicController::class, 'show'])->name('ethnic.show');
Route::post('ethnic/{id}/update', [EthnicController::class, 'update'])->name('ethnic.update');
Route::post('ethnic/{id}/destroy', [EthnicController::class, 'destroy'])->name('ethnic.destroy');

Route::get('/customers',[CustomerController::class,'index'])->name('customers');
Route::post('/customers',[CustomerController::class,'store'])->name('customers.store');
Route::get('/customers/{id}',[CustomerController::class,'show'])->name('customers.show');


