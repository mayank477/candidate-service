<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateCourseController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::prefix('me')->group(function () {
        Route::get('/me', [AuthController::class, 'candidate']);
        Route::resource('candidate-courses', CandidateCourseController::class);
        Route::post('/candidate-courses/{candidate_course}/progressions', [CandidateCourseController::class, 'progression']);
    });

    Route::resource('courses', CourseController::class)->only('index', 'show');
});
