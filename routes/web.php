<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/form', function () {
    return view('form');
});
