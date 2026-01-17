<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProductCompareController;
use App\Http\Controllers\Profile;
use App\Models\Favorite;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[AuthController::class,'showRegister'])->name('show.register');
Route::get('/login',[AuthController::class,'showLogin'])->name('show.login');

Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::post('/favorite/toggle', [FavoriteController::class, 'toggle'])
    ->middleware('auth')
    ->name('favorite.toggle');

Route::get('/favourite', [ProductCompareController::class, 'saved'])
    ->name('products.saved');

Route::get('/home', function () {
    return view('page.index');
});
Route::get('/search', [ProductCompareController::class, 'index']);

Route::get('/products/{unique_id}', [ProductCompareController::class, 'show']);

Route::get('/profile',[Profile::class,'index']);

