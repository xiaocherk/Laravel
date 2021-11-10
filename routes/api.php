<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    // GET
    Route::get('person', [FormController::class, 'viewPerson']);
    Route::get('person/{id}', [FormController::class, 'show']);

    // POST
    Route::post('form', [FormController::class, 'addPerson']);

    // PUT
    Route::put('person/{id}', [FormController::class, 'update2']);

    // DELETE
    Route::delete('person/{id}', [FormController::class, 'remove']);

    Route::post('logout',[AuthController::class,'logout']);
}); 
