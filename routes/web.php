<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserConroller;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('register', function () {
    return view('register');
})->name('register');



Route::get('user/create', function () {
    return view('create');
})->name('user.create');


Route::post('register', [RegisterController::class, 'store'])->name('user.register');
Route::get('login', [LoginController::class, 'login'])->name('user.login');

Route::get('logout', [LoginController::class, 'logout'])->name('user.logout')->middleware('auth');
Route::get('/users', [UserConroller::class, 'index'])->name('user.index')->middleware('auth');
Route::post('user/store', [UserConroller::class, 'store'])->name('user.store')->middleware('auth');
Route::get('user/{id}', [UserConroller::class, 'destroy'])->name('user.delete')->middleware('auth');