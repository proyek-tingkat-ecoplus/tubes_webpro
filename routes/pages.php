<?php
use Illuminate\Support\Facades\Route;
Route::prefix('pages')->group(function(){
    Route::get('/user', function () {
        return view('admin.pages.user.index');
    })->name('pages.user.index');

    Route::get('/user/add', function () {
        return view('admin.pages.user.add');
    })->name('pages.user.add');

    Route::post('/user/add', function () {
        return view('admin.pages.user.add');
    })->name('pages.user.store');

    Route::get('/user/{id}/editpass', function($id){
        return view('admin.pages.user.editpass', ["id" => $id]);
    })->name('pages.user.editpass');

    Route::get('/user/{id}/detail', function($id){
        return view('admin.pages.user.detail', ["id" => $id]);
    })->name('pages.user.detail');

    Route::get('/user/{id}/edit', function($id){
        return view('admin.pages.user.edit', ["id" => $id]);
    })->name('pages.user.edit');

    Route::get('role', function(){
        return view('admin.pages.role.index');
    })->name('pages.role.index');

    Route::get('role/add', function(){
        return view('admin.pages.role.add');
    })->name('pages.role.add');

    Route::get('role/{id}/edit', function($id){
        return view('admin.pages.role.edit', ["id" => $id]);
    })->name('pages.role.edit');

    Route::get('kantor_dinas', function(){
        return view('admin.pages.kantor_dinas.index');
    })->name('pages.kantor_dinas.index');

    Route::get('kantor_dinas/add', function(){
        return view('admin.pages.kantor_dinas.add');
    })->name('pages.kantor_dinas.add');

    Route::get('kantor_dinas/{id}/edit', function($id){
        return view('admin.pages.kantor_dinas.edit', ["id" => $id]);
    })->name('pages.kantor_dinas.edit');

    Route::get('forum', function(){
        return view('admin.pages.forum.index');
    })->name('pages.forum.index');

    Route::get('forum/add', function(){
        return view('admin.pages.forum.add');
    })->name('pages.forum.add');

    Route::get('forum/{id}/edit', function($id){
        return view('admin.pages.forum.edit', ["id" => $id]);
    })->name('pages.forum.edit');

    Route::get('kategori', function(){
        return view('admin.pages.kategori.index');
    })->name('pages.kategori.index');

    Route::get('kategori/add', function(){
        return view('admin.pages.kategori.add');
    })->name('pages.kategori.add');

    Route::get('kategori/{id}/edit', function($id){
        return view('admin.pages.kategori.edit', ["id" => $id]);
    })->name('pages.kategori.edit');

    Route::get('comment', function(){
        return view('admin.pages.comment.index');
    })->name('pages.comment.index');

    Route::get('comment/add', function(){
        return view('admin.pages.comment.add');
    })->name('pages.comment.add');

    Route::get('comment/{id}/edit', function($id){
        return view('admin.pages.comment.edit', ["id" => $id]);
    })->name('pages.comment.edit');

    Route::get('proposal', function(){
        return view('admin.pages.proposal.index');
    })->name('pages.proposal.index');

    Route::get('proposal/add', function(){
        return view('admin.pages.proposal.add');
    })->name('pages.proposal.add');

    Route::get('proposal/{id}/edit', function($id){
        return view('admin.pages.proposal.edit', ["id" => $id]);
    })->name('pages.proposal.edit');

    Route::get('inventaris', function(){
        return view('admin.pages.inventaris.index');
    })->name('pages.inventaris.index');

    Route::get('inventaris/add', function(){
        return view('admin.pages.inventaris.add');
    })->name('pages.inventaris.add');

    Route::get('inventaris/{id}/detailalat', function($id){
        return view('admin.pages.inventaris.detailalat', ["id" => $id]);
    })->name('pages.inventaris.detailalat');

    Route::get('inventaris/{id}/edit', function($id){
        return view('admin.pages.inventaris.edit', ["id" => $id]);
    })->name('pages.inventaris.edit');

    Route::get('pemetaanalat', function(){
        return view('admin.pages.pemetaanalat.index');
    })->name('pages.pemetaanalat.index');

    Route::get('pemetaanalat/marker', function(){
        return view('admin.pages.pemetaanalat.table.index');
    })->name('pages.pemetaanalat.marker.index');

    Route::get('pemetaanalat/marker/add', function(){
        return view('admin.pages.pemetaanalat.table.add');
    })->name('pages.pemetaanalat.marker.add');

    Route::get('pemetaanalat/{id}/detailpemetaan', function($id){
        return view('admin.pages.pemetaanalat.table.detailpemetaan', ["id" => $id]);
    })->name('pages.pemetaanalat.detailpemetaan');

    Route::get('pemetaanalat/{id}/edit', function($id){
        return view('admin.pages.pemetaanalat.table.edit', ["id" => $id]);
    })->name('pages.pemetaanalat.edit');

    Route::get('helper', function(){
        return view('admin.pages.helperpage.index');
    })->name('pages.helper.index');

    Route::get('helper/add', function(){
        return view('admin.pages.helperpage.add');
    })->name('pages.helper.add');

    Route::get('helper/{id}/edit', function($id){
        return view('admin.pages.helperpage.edit', ["id" => $id]);
    })->name('pages.helper.edit');
});
