<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Family Organizer API',
    ]);
});


Route::get('/register', function () { 
    return view('auth.register');})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/users', function () {
    return view('admin.users');
})->name('admin.users');


Route::get('/admin/reports', function () {
    return view('admin.reports');
})->name('admin.reports');

Route::get('/', function () {
    return view('home');
})->name('home');