<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactStatusHistoryController;
use App\Http\Controllers\ContactCommentController;
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
Route::get('/export-csv',[DashboardController::class,'exportCsv'])->name('export.csv');
Route::get('/contact/{id}/edit', [ContactStatusHistoryController::class, 'edit'])->name('contact.edit');
Route::get('/contact/{contact}/comment/edit', [ContactCommentController::class, 'edit'])->name('comment.edit');

Route::post('/post', [ContactController::class, 'store']);
Route::post('/Apost', [AdminController::class, 'store']);
Route::post('/login', [loginController::class, 'login']);
Route::post('/contact/{contact}/comment/update', [ContactCommentController::class, 'update'])->name('comment.update');

Route::post('/contact/{id}/status', [ContactStatusHistoryController::class, 'changestatus'])->name('contact.changestatus');
Route::get('/contact/{contact}/comment/edit', [ContactCommentController::class, 'edit'])->name('comment.edit');
Route::post('/contact/{contact}/comment/update', [ContactCommentController::class, 'update'])->name('comment.update');
