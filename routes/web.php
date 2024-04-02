<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', function ()  {
    return view('welcome'); 
})->name('welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// 5 route dibawah ini dummy biar ga error aja
Route::get('/user', function(){ return view('welcome'); })->name('user.index');
Route::get('/bookborrowed', function(){ return view('welcome'); })->name('bookborrowed.index');
Route::get('/bookcategory', function(){ return view('welcome'); })->name('bookcategory.index');
Route::get('/book', function(){ return view('welcome'); })->name('book.index');
Route::get('/bookcollection', function(){ return view('welcome'); })->name('bookcollection.index');

Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->middleware('auth')->name('admin.dashboard');
Route::get('/petugas/dashboard', [DashboardController::class, 'petugasDashboard'])->middleware('auth')->name('petugas.dashboard');
Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->middleware('auth')->name('user.dashboard');

