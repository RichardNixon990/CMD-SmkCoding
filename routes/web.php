<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;
use App\Models\Post;

Route::get('/', function () {
    return view('home',[
        'articles' => Post::all(),
    ]
);
})->name('home');

Route::group(['prefix' => 'artikel', 'as' => 'artikel.'], function () {
Route::get('add', [ArtikelController::class, 'index'])->name('add');
Route::post('store', [ArtikelController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'kategori', 'as' => 'kategori.'], function () {
    Route::get('add', [KategoriController::class, 'index'])->name('add');
Route::post('store', [KategoriController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'register'])->name('register');
});

