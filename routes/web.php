<?php

use App\Http\Controllers\Excel\ExportController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\pdf\PdfController;
use App\Http\Controllers\UserController;
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

Route::get('/tambahpesan', function () {
    return view('tambahpesan');
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

Route::get('/edit-profile', function () {
    return view('admin.pages.edit-profile');
});

Route::get('/forgetPassword', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forgetPassword', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::prefix('pages')->group(function(){
    Route::get('/user', function () {
        return view('admin.pages.user.index');
    });

    Route::get('/user/add', function () {
        return view('admin.pages.user.add');
    });

    Route::post('/user/add', function () {
        return view('admin.pages.user.add');
    });

    Route::get('/user/{id}/editpass', function($id){
        return view('admin.pages.user.editpass', ["id" => $id]);
    });

    Route::get('/user/{id}/detail', function($id){
        return view('admin.pages.user.detail' ,["id" => $id]);
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

    Route::get('proposal', function(){
        return view('admin.pages.proposal.index');
    });

    Route::get('proposal/add', function(){
        return view('admin.pages.proposal.add');
    });

    Route::get('proposal/{id}/edit', function($id){
        return view('admin.pages.proposal.edit', ["id" => $id]);
    });

    Route::get('inventaris', function(){
        return view('admin.pages.inventaris.index');
    });

    Route::get('inventaris/add', function(){
        return view('admin.pages.inventaris.add');
    });

    Route::get('inventaris/{id}/edit', function($id){
        return view('admin.pages.inventaris.edit', ["id" => $id]);
    });

    Route::get('pemetaanalat', function(){
        return view('admin.pages.pemetaanalat.index');
    });

    Route::get('pemetaanalat/marker', function(){
        return view('admin.pages.pemetaanalat.table.index');
    });

    Route::get('pemetaanalat/marker/add', function(){
        return view('admin.pages.pemetaanalat.table.add');
    });

    Route::get('pemetaanalat/{id}/edit', function($id){
        return view('admin.pages.pemetaanalat.table.edit', ["id" => $id]);
    });

    Route::get('helper', function(){
        return view('admin.pages.helperpage.index');
    });

    Route::get('helper/add', function(){
        return view('admin.pages.helperpage.add');
    });

    Route::get('helper/{id}/edit', function($id){
        return view('admin.pages.helperpage.edit', ["id" => $id]);
    });
});

Route::post('/user/edit', [UserController::class,'editProfile']);

Route::get('/proposal/{path}', function($path){
    $fullPath = public_path($path);
    if (file_exists($fullPath)) {
        return response()->file($fullPath);
    } else {
        abort(404, 'File not found.');
    }
})->where('path', '.*');

Route::prefix('api/user')->group(function () {
    Route::get('/profile', [UserController::class, 'getProfile']);
    Route::get('/role', [UserController::class, 'getRole']);
});

Route::prefix("/export/pdf")->group(function(){
    Route::get('/users', [PdfController::class, 'exportPdfUser']);
    Route::get('/role', [PdfController::class, 'exportPdfRole']);
    Route::get('/forum', [PdfController::class, 'exportPdfForum']);
    Route::get('/comment', [PdfController::class, 'exportPdfComment']);
    Route::get('/inventaris', [PdfController::class, 'exportPdfInventaris']);
    Route::get('/pemetaan', [PdfController::class, 'exportPdfPemetaan']);
});
