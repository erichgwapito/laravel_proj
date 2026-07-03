<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/counter', 'pages::counter');

Route::get('/', function () {
    return view('welcome');
});