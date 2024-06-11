<?php

use App\Http\Controllers\admin\CourseAdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MateriAdminController;
use App\Http\Controllers\guest\BerandaController;
use App\Http\Controllers\user\HomeUserController;
use App\Http\Controllers\user\CourseUserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Guest
Route::get('/', [BerandaController::class, 'index']);

// Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// User
Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/home', [HomeUserController::class, 'index']);
    Route::get('/education', [CourseUserController::class, 'index']);
    Route::get('/education-detail/{id}', [CourseUserController::class, 'show']);
});

// Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    Route::get('/manage-education', [CourseAdminController::class, 'index']);
    Route::get('/manage-education/create', [CourseAdminController::class, 'create']);
    Route::post('/manage-education/create', [CourseAdminController::class, 'store']);
    Route::get('/manage-education/edit/{id}', [CourseAdminController::class, 'edit']);
    Route::put('/manage-education/edit/{id}', [CourseAdminController::class, 'update']);
    Route::delete('/manage-education/delete/{id}', [CourseAdminController::class, 'destroy']);

    Route::get('/manage-materi/{id}', [MateriAdminController::class, 'index']);
    Route::get('/manage-materi/create/{id}', [MateriAdminController::class, 'create']);
    Route::post('/manage-materi/create/{id}', [MateriAdminController::class, 'store']);
    Route::get('/manage-materi/edit/{course_id}/{materi_id}', [MateriAdminController::class, 'edit']);
    Route::put('/manage-materi/edit/{course_id}/{materi_id}', [MateriAdminController::class, 'update']);
    Route::delete('/manage-materi/delete/{course_id}/{materi_id}', [MateriAdminController::class, 'destroy']);
});
