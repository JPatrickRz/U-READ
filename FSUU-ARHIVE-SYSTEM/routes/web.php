<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUploadController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserTrashController;
use App\Http\Middleware\Is_Admin;


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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.dashboard')->middleware('is_admin');

// Google Route
Route::get('auth/google',[GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[GoogleAuthController::class, 'callbackGoogle']);

// USER SIDEBAR ROUTE
Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
Route::get('/profile', [UserProfileController::class, 'profile'])->name('user.profile');
Route::get('/notification', [UserNotificationController::class, 'notification'])->name('user.notification');
Route::get('/trash', [UserTrashController::class, 'trash'])->name('user.trash');

// Library Route



// Admin Upload Route
Route::get('/admin/upload', [AdminUploadController::class, 'upload'])->name('admin.admin-upload')->middleware('is_admin');




// Upload Route
Route::post('/admin/upload', [PublicationController::class, 'store'])->name('publishers.store');

// PDF Route
Route::get('/publications/{id}/pdf', [PublicationController::class, 'showPdf'])->name('publications.pdf');
Route::get('/publications/{id}/pdf', [PublicationController::class, 'downloadPDF'])->name('publications.pdf');


// Display Route
Route::get('/publications/{id}', [PublicationController::class, 'show'])->name('publications.show');

// Search Route
Route::post('/home',[PublicationController::class, 'search'])->name('publications.search');

