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


Route::prefix('pages')->group(function(){
    Route::get('/user', function () {
        return view('admin.pages.user.index');
    });
    Route::get('/user/add', function () {
        return view('admin.pages.user.add');
    });

    Route::get('/user/{id}/edit', function($id){
        return view('admin.pages.user.edit' ,["id" => $id]);
    });

    Route::get('role', function(){
        return view('admin.pages.role.index');
    });

    Route::get('role/add', function(){
        return view('admin.pages.role.add');
    });

    Route::get('role/{id}/edit', function($id){
        return view('admin.pages.role.edit', ["id" => $id]);
    });

    Route::get('tag', function(){
        return view('admin.pages.tag.index');
    });

    Route::get('tag/add', function(){
        return view('admin.pages.tag.add');
    });

    Route::get('tag/{id}/edit', function($id){
        return view('admin.pages.tag.edit', ["id" => $id]);
    });

    Route::get('forum', function(){
        return view('admin.pages.forum.index');
    });

    Route::get('forum/add', function(){
        return view('admin.pages.forum.add');
    });

    Route::get('forum/{id}/edit', function($id){
        return view('admin.pages.forum.edit', ["id" => $id]);
    });

    Route::get('comment', function(){
        return view('admin.pages.comment.index');
    });

    Route::get('comment/add', function(){
        return view('admin.pages.comment.add');
    });

    Route::get('comment/{id}/edit', function($id){
        return view('admin.pages.comment.edit', ["id" => $id]);
    });
});


