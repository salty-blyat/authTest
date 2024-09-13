<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorElement;

Route::get('/', function () {
    return view('welcome');
})->name('home'); 


Route::get('login', function () {
    return view('welcome');
})->name('login'); 


Route::get('signin', function () {
    return view('welcome');
})->name('signin'); 

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard'); 


Route::prefix('auth')->group(function() { 
    Route::post('signin', [AuthController::class, 'signin'])->name('auth.signin');

    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware('role-check')->group(function(){
    Route::get('dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
 
    Route::get('shop', function(){
        return view('shop');
    })->name('shop');
});


// Route::get('dashboard', function () {
//     return view('dashboard');
// })->middleware('auth')->name('dashboard'); 