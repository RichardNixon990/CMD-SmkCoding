<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;




use App\Models\Post;

Route::get('/', function () {
    return view('home',[
        'articles' => Post::all(),
    ]);
})->name('home');


Route::group(['prefix' => 'artikel', 'as' => 'artikel.', 'middleware' => ['checkadmin'] ], function () {
Route::get('add', [ArtikelController::class, 'index'])->name('add');
Route::post('store', [ArtikelController::class, 'store'])->name('store');
Route::get('manage', [ArtikelController::class, 'manage'])->name('manage');
Route::delete('delete/{post}', [ArtikelController::class, 'destroy'])->name('delete');
Route::post('edit/{post}', [ArtikelController::class, 'edit'])->name('edit');
Route::post('update/{post}', [ArtikelController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'kategori', 'as' => 'kategori.', 'middleware' => ['checkadmin']], function () {
    Route::get('add', [KategoriController::class, 'index'])->name('add');
Route::post('store', [KategoriController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('signin', [AuthController::class, 'signin'])->name('signin');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('manageuser', [UserController::class, 'index'])->name('manageuser')->middleware('checkadmin');
