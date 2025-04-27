<?php
use Illuminate\Support\Facades\Route;
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

    Route::get('forum', function(){
        return view('admin.pages.forum.index');
    });

    Route::get('forum/add', function(){
        return view('admin.pages.forum.add');
    });

    Route::get('forum/{id}/edit', function($id){
        return view('admin.pages.forum.edit', ["id" => $id]);
    });

    Route::get('kategori', function(){
        return view('admin.pages.kategori.index');
    });

    Route::get('kategori/add', function(){
        return view('admin.pages.kategori.add');
    });

    Route::get('kategori/{id}/edit', function($id){
        return view('admin.pages.kategori.edit', ["id" => $id]);
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

    Route::get('inventaris/{id}/detailalat', function($id){
        return view('admin.pages.inventaris.detailalat', ["id" => $id]);
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

    Route::get('pemetaanalat/{id}/detailpemetaan', function($id){
        return view('admin.pages.pemetaanalat.table.detailpemetaan', ["id" => $id]);
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
