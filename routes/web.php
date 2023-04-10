<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(LoginController::class)->group(function () 
{
    Route::get('/login', 'index')->name('login.page');
    Route::post('/login', 'login')->name('login');
});

// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login.index');
// ROute::post('/login')

// Auth::routes();

Route::middleware('custom.auth')->group(function () 
{
    Route::get('/home', [HomeController::class,'index'])->name('home');
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');
});

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');
