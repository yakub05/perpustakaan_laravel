<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PeminjamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', function () {
    return view('login');
})->name ('login');
Route::get('/register', function () {
    return view('register');
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth.user')->group(function () {
Route::get('/', [BukuController::class, 'index']);
Route::get('/cart', [CartController::class, 'index']);

// Route::post('/cart', 'CartController@add')->name('cart.add');
Route::post('/cart', [CartController::class, 'add'])->name('cart.add');
Route::post('/peminjam', [PeminjamController::class, 'add'])->name('peminjam.add');
Route::get('/peminjam', [PeminjamController::class, 'index'])->name('peminjam.index');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/logout', [AuthController::class, 'logout']);
});
