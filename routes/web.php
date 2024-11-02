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
