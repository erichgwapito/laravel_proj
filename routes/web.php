<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/counter', 'pages::counter');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');