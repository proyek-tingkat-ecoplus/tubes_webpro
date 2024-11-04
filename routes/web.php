<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/forum', function () {
    return view('form');
});

Route::get('/profil', function (){
    return view('profilKepdes');
});

Route::get('/pemetaan', function () {
    return view('pemetaan');
});

Route::get('/informasi', function () {
    return view('informasi');
});

Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
});

Route::get('/pages/user/', function () {
    return view('admin.pages.user.index');
});
Route::get('/pages/user/add', function () {
    return view('admin.pages.user.add');
});

Route::get('/pages/user/{id}/edit', function($id){
    return view('admin.pages.user.edit' ,["id" => $id]);
});
