<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'app' => 'Candidate Service',
        'version' => '1.0.0'
    ]);
});
