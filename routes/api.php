<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\ComentForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PemetaanController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [authController::class, 'login']);

Route::middleware("auth:api")->prefix("auth")->group(function(){
    Route::get('/me', [authController::class, 'me']);
    Route::post('/logout', [authController::class, 'logout']);
    Route::post('/refresh', [authController::class, 'refresh']);
});


Route::prefix("user")->group(function(){
    Route::get("/",[UserController::class, 'index']);
    Route::get("/{id}",[UserController::class, 'find']);
    Route::post('/add', [UserController::class, 'post']);
    Route::patch('/{id}/edit', [UserController::class, 'update']);
    Route::delete('/{id}/delete', [UserController::class, 'deletes']);
});

Route::prefix("role")->group(function(){
    Route::get("/",[RoleController::class, 'index']);
    Route::get("/{id}",[RoleController::class, 'find']);
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

Route::prefix('proposal')->group(callback: function(){
    Route::post('/add', [ProposalController::class, 'post']);
    Route::patch('/{id}/edit', [ProposalController::class, 'update']);
    Route::delete('/{id}/delete', [ProposalController::class, 'deletes']);
});

Route::prefix('inventaris')->group(callback: function(){
    Route::get('/',[InventarisController::class, 'index']);
    Route::get("/{id}",[InventarisController::class, 'find']);
    Route::post('/add', [InventarisController::class, 'post']);
    Route::patch('/{id}/edit', [InventarisController::class, 'update']);
    Route::delete('/{id}/delete', [InventarisController::class, 'deletes']);
});

Route::prefix('pemetaanalat')->group(callback: function(){
    Route::get('/', [PemetaanController::class, 'index']);
    Route::post('/add', [PemetaanController::class, 'post']);
    Route::patch('/{id}/edit', [PemetaanController::class, 'update']);
    Route::delete('/{id}/delete', [PemetaanController::class, 'deletes']);
    Route::get("/photo/{filename}", function($filename){
        return response()->file(public_path('image/pemetaan/'.$filename));
    });
});




