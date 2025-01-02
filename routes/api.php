<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\ComentForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Excel\ExportController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\pdf\PdfController;
use App\Http\Controllers\PemetaanController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [authController::class, 'login']);
Route::post('/register', [authController::class, 'register']);

Route::prefix("auth")->middleware("auth:api")->group(function(){
    Route::get('/me', [authController::class, 'me']);
    Route::post('/logout', [authController::class, 'logout']);
    Route::post('/refresh', [authController::class, 'refresh']);
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(["auth:api","role:Admin,Petugas,Kepala Desa"]);

Route::prefix("user")->middleware(["auth:api","role:Admin"])->group(function(){
    Route::get("/",[UserController::class, 'index']);
    Route::get("/table",[UserController::class, 'table']);
    Route::get("/{id}",[UserController::class, 'find']);
    Route::get('/{id}/detail', [UserController::class, 'detail']);
    Route::post('/add', [UserController::class, 'post']);
    Route::patch('/{id}/edit', [UserController::class, 'update']);
    Route::patch('/{id}/editpass', [UserController::class, 'editpass']);
    Route::delete('/{id}/delete', [UserController::class, 'deletes']);
});

Route::prefix("role")->middleware(["auth:api","role:Admin"])->group(function(){
    Route::get("/",[RoleController::class, 'index']);
    Route::get("/table",[RoleController::class, 'table']);
    Route::get("/{id}",[RoleController::class, 'find']);
    Route::post('/add', [RoleController::class, 'post']);
    Route::patch('/{id}/edit', [RoleController::class, 'update']);
    Route::delete('/{id}/delete', [RoleController::class, 'deletes']);
});

Route::prefix("forum")->middleware(["auth:api","role:Petugas,Admin"])->group(function(){
    Route::get("/", [ForumController::class, 'index']);
    Route::get("/table", [ForumController::class, 'table']);
    Route::get("/{id}", [ForumController::class, 'find']);
    Route::post('/add', [ForumController::class, 'post']);
    Route::patch('/{id}/edit', [ForumController::class, 'update']);
    Route::delete('/{id}/delete', [ForumController::class, 'deletes']);
});

Route::prefix("comment")->middleware(["auth:api","role:Petugas,Admin"])->group(function(){
    Route::get("/", [CommentController::class, 'index']);
    Route::get("/table", [CommentController::class, 'table']);
    Route::get("/{id}", [CommentController::class, 'find']);
    Route::post('/add', [CommentController::class, 'post']);
    Route::patch('/{id}/edit', [CommentController::class, 'update']);
    Route::delete('/{id}/delete', [CommentController::class, 'deletes']);
    Route::get("/{id}/post", [CommentController::class, 'getCommentByPost']);
});

Route::prefix('proposal')->middleware(["auth:api","role:Kepala Desa, Petugas, Admin"])->group(callback: function(){
    Route::get('/', [ProposalController::class, 'index']);
    Route::get("/table", [ProposalController::class, 'table']);
    Route::post('/add', [ProposalController::class, 'post']);
    Route::get("/{id}", [ProposalController::class, 'find']);
    Route::patch('/{id}/edit', [ProposalController::class, 'update']);
    Route::delete('/{id}/delete', [ProposalController::class, 'deletes']);
});

Route::prefix('inventaris')->middleware(["auth:api","role:Petugas,Admin"])->group(callback: function(){
    Route::get('/',[InventarisController::class, 'index']);
    Route::get('/table',[InventarisController::class, 'table']);
    Route::get("/{id}",[InventarisController::class, 'find']);
    Route::post('/add', [InventarisController::class, 'post']);
    Route::patch('/{id}/edit', [InventarisController::class, 'update']);
    Route::delete('/{id}/delete', [InventarisController::class, 'deletes']);
});

Route::prefix('pemetaanalat')->middleware(["auth:api","role:Petugas,Admin,Kepala Desa"])->group(callback: function(){
    Route::get('/', [PemetaanController::class, 'index']);
    Route::get("/find/{id}",[PemetaanController::class, 'find']);
    Route::get("/table", [PemetaanController::class, 'table']);
    Route::post('/add', [PemetaanController::class, 'post']);
    Route::patch('/{id}/edit', [PemetaanController::class, 'update']);
    Route::delete('/{id}/delete', [PemetaanController::class, 'deletes']);
});

// ini sengaja public soalnya idah terlanjut buat di public
Route::get("/pemetaanalat/photo/{filename}", function($filename){
    return response()->file(public_path('image/pemetaan/'.$filename));
});

Route::prefix('exports')->middleware(["auth:api","role:Petugas,Admin,Kepala Desa"])->group(function () {
    Route::get('/users/excel', [ExportController::class, 'exportUsers']);
    Route::get('/role/excel', [ExportController::class, 'exportRole']);
    Route::get('/forum/excel', [ExportController::class, 'exportForum']);
    Route::get('/comment/excel', [ExportController::class, 'exportComment']);
    Route::get('/proposal/excel', [ExportController::class, 'exportProposal']);
    Route::get('/inventaris/excel', [ExportController::class, 'exportInventaris']);
    Route::get('/pemetaanalat/excel', [ExportController::class, 'exportPemetaan']);


    Route::get('/users/pdf', [PdfController::class, 'exportPdfUser']);
    Route::get('/role/pdf', [PdfController::class, 'exportPdfRole']);
    Route::get('/forum/pdf', [PdfController::class, 'exportPdfForum']);
    Route::get('/comment/pdf', [PdfController::class, 'exportPdfComment']);
    Route::get('/inventaris/pdf', [PdfController::class, 'exportPdfInventaris']);
    Route::get('/pemetaanalat/pdf', [PdfController::class, 'exportPdfPemetaan']);
});




