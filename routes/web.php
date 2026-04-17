<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Family Organizer API',
    ]);
});


Route::get('/register', function () {
    return view('auth.register');
})->name('register');
