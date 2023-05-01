<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\TutorController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/',[LandingController::class,'landingPage'])->name('landing');

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

    Route::controller(CourseController::class)->group(function () 
    {
        Route::get('/courses', 'index')->name('courses.all');
        Route::get('/course/create', 'create')->name('courses.create');
        Route::post('/course/post', 'post')->name('course.post');
        Route::get('/course/edit/{id}','edit')->name('course.edit');
        Route::post('/course/update/{id}','update')->name('course.update');
        Route::get('/course/delete/{id}','delete')->name('course.delete');
    });

    Route::controller(BlogController::class)->group(function () 
    {
        Route::get('/blog/all', 'index')->name('blog.index');
        Route::get('/blog/create','create')->name('blog.create');
        Route::post('/blog/store', 'store')->name('blog.store');
        Route::get('/blog/edit/{id}', 'edit')->name('blog.edit');
        Route::post('/blog/update/{id}', 'update')->name('blog.update');
        Route::get('/blog/delete/{id}', 'delete')->name('blog.delete');
    });

    Route::controller(JobController::class)->group(function () 
    {
        Route::get('/jobs/all', 'index')->name('job.all');
        Route::get('/job/create', 'create')->name('job.create');
        Route::post('/job/store','store')->name('job.store');
        Route::get('/job/edit/{id}','edit')->name('job.edit');
        Route::post('/job/update/{id}', 'update')->name('job.update');
        Route::get('/job/delete/{id}', 'delete')->name('job.delete');
        Route::get('/job/applicants/{id}', 'applicants')->name('job.applicant');
    });

    Route::controller(TutorController::class)->group(function () 
    {
        Route::get('/tutor', 'index')->name('tutor.index');
        // Route::post('/orders', 'store');
    });

});

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');
