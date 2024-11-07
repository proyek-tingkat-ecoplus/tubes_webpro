<?php

use App\Http\Controllers\ComentForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix("user")->group(function(){
    Route::post('/add', [UserController::class, 'post']);
    Route::patch('/{id}/edit', [UserController::class, 'update']);
    Route::delete('/{id}/delete', [UserController::class, 'deletes']);
});

Route::prefix("role")->group(function(){
    Route::post('/add', [RoleController::class, 'post']);
    Route::patch('/{id}/edit', [RoleController::class, 'update']);
    Route::delete('/{id}/delete', [RoleController::class, 'deletes']);
});

Route::prefix("tag")->group(function(){
    Route::post('/add', [TagController::class, 'post']);
    Route::patch('/{id}/edit', [TagController::class, 'update']);
    Route::delete('/{id}/delete', [TagController::class, 'deletes']);
});

Route::prefix("forum")->group(function(){
    Route::post('/add', [ForumController::class, 'post']);
    Route::patch('/{id}/edit', [ForumController::class, 'update']);
    Route::delete('/{id}/delete', [ForumController::class, 'deletes']);
});

Route::prefix("comment")->group(function(){
    Route::post('/add', [CommentController::class, 'post']);
    Route::patch('/{id}/edit', [CommentController::class, 'update']);
    Route::delete('/{id}/delete', [CommentController::class, 'deletes']);
});




