<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\API\AuthController;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;

// GET
Route::view('/', 'ys.welcome');

// AUTH
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

// Route::post('register',[AuthController::class,'register']);
// Route::post('login',[AuthController::class,'login']);

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::view('person', 'ys.personView');
    Route::get('personView', [FormController::class, 'viewPerson']);

    Route::get('person/{id}', [FormController::class, 'show']);

    // POST
    Route::post('personView', [FormController::class, 'addPerson']);

    // PUT
    Route::get('update/{id}', [FormController::class, 'checkUpdate']);
    Route::put('updatePerson/{id}', [FormController::class, 'updatePerson']);

    // DELETE
    Route::delete('remove/{id}', [FormController::class, 'remove']);

    Route::get('programme', [FormController::class, 'programme']);
    Route::get('student/{id}', [FormController::class, 'student']);
    Route::get('course/{id}', [FormController::class, 'course']);

    //Route::post('logout',[AuthController::class,'logout']);
});

Route::get('testing',[FormController::class,'testing']);
