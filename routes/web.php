<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/forma', function () {
    return view('forma');
});


Route::get('/login.blade.php', function () {
    return view('forma-login');
});

Route::get('/forma.admin.blade.php', function () {
    return view('forma-admin');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');



Route::post('/post', [ContactController::class, 'store']);
Route::post('/Apost', [AdminController::class, 'store']);
Route::post('/login', [loginController::class, 'login']);
