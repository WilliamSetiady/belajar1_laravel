<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\BelajarController;

Route::get('/', function () {
    return view('welcome');
});

//get: hanya bisa melihat dan baca
//post: tambah data dan ubah data(form)
//put: ubah data(form)
//delete: hapus data(form)


route::get('belajar',[\App\Http\Controllers\BelajarController::class, 'index']);
route::get('tambah',[\App\Http\Controllers\BelajarController::class, 'tambah'])->name('tambah');

route::get('data/hitungan', [BelajarController::class, 'viewHitungan']);
route::get('edit/data-hitung/{id}', [BelajarController::class, 'editDataHitung'])->name('edit.data-hitung');
route::get('edit/{id}', [\App\Http\Controllers\BelajarController::class, 'update']);
route::put('update/tambahan/{id}', [BelajarController::class, 'updateTambahan'])->name('update.tambahan');

route::get('duar', [\App\Http\Controllers\BelajarController::class, 'nuall']);

route::post('tambah_action', [\App\Http\Controllers\BelajarController::class, 'tambahAction'])->name('tambah_action');