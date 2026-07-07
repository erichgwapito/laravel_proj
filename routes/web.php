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
    return redirect('/');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function () {
    session(['demo_logged_in' => true]);
    return redirect('/');
});

Route::get('/logout', function () {
    session()->forget('demo_logged_in');
    return redirect('/');
});

Route::livewire('/todos', 'pages::todos');
Route::livewire('/counter', 'pages::counter');