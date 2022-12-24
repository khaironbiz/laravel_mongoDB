<?php

use App\Http\Controllers\Api\CustomerController;
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
Route::get('users/{id}', [UserController::class,'show'])->name('users.show');
Route::get('users/{id}/edit', [UserController::class,'edit'])->name('users.edit');

Route::get('/customers',[CustomerController::class,'index'])->name('customers');
Route::post('/customers',[CustomerController::class,'store'])->name('customers.store');
Route::get('/customers/{id}',[CustomerController::class,'show'])->name('customers.show');


