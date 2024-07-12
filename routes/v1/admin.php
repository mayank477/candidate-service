<?php

use App\Http\Controllers\AdminCandidateController;
use App\Http\Controllers\AdminCourseChapterController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
  
    Route::resource('candidates', AdminCandidateController::class);
    Route::resource('candidates.awards', AwardController::class);
    Route::resource('candidates.files', FileController::class);
    Route::resource('courses', AdminCourseController::class)->only('index', 'store', 'show', 'update');
    Route::resource('courses.chapters', AdminCourseChapterController::class)->only('index', 'store', 'show', 'update');
});

Route::resource('candidates', CandidateController::class);
