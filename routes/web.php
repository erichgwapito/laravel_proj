<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    session(['demo_logged_in' => true]);
    return redirect('/counter');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function () {
    session(['demo_logged_in' => true]);
    return redirect('/counter');
});

Route::livewire('/counter', 'pages::counter');