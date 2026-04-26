<?php

use Illuminate\Support\Facades\Route;


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
// 
Route::get('/parent/dashboard', function () {
    return view('parent.dashboard');
})->name('parent.dashboard');

Route::get('/parent/tasks', function () {
    return view('parent.tasks');
})->name('parent.tasks');

Route::get('/parent/messages', function () {
    return view('parent.messages');
})->name('parent.messages');

Route::get('/nounou/dashboard', function () {
    return view('nounou.dashboard');
})->name('nounou.dashboard');

Route::get('/nounou/planning', function () {
    return view('nounou.planning');
})->name('nounou.planning');

Route::get('/nounou/messages', function () {
    return view('nounou.messages');
})->name('nounou.messages');

Route::get('/nounou/profile', function () {
    return view('nounou.profile');
})->name('nounou.profile');

Route::get('/parent/family', function () {
    return view('parent.family');
})->name('parent.family');

Route::get('/parent/nanny-profile', function () {
    return view('parent.nanny-profile');
})->name('parent.nanny-profile');

Route::get('/parent/calendar', function () {
    return view('parent.calendar');
})->name('parent.calendar');

Route::get('/parent/nannies', function () {
    return view('parent.nannies');
})->name('parent.nannies');
