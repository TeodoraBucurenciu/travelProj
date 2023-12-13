<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\AdminTripsController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AccountController;

use Illuminate\Support\Facades\Auth;

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

Route::get('/', [MainPageController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/form', [ContactController::class, 'showContactForm']);
Route::post('/form', [ContactController::class, 'submitForm']);
Route::get('/trip', [TripsController::class, 'index'])->name('trip');
Route::get('/adminTrips', [AdminTripsController::class, 'index'])->name('adminTrips');
Route::get('/adminBlog', [AdminBlogController::class, 'index'])->name('adminBlog');
Route::get('/activity', [ActivityController::class, 'index'])->name('activity');
Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::post('/account/update-email', [AccountController::class, 'updateEmail'])->name('account.updateEmail');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
