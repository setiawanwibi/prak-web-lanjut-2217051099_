<?php

use App\Http\Controllers\ProfileController; // Pastikan huruf 'H' pada 'Http' besar
use App\Http\Controllers\UserController;    // Tambahkan ini jika belum ada
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route ke ProfileController
Route::get('/profile', [ProfileController::class, 'profile']);

// Route ke UserController
Route::get('/user/profile', [UserController::class, 'profile']); // Hapus duplikasi

// Route untuk menampilkan halaman create_user
Route::get('/user/create', function () {
    return view('create_user');
});

// Route untuk menyimpan data dari form user
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
