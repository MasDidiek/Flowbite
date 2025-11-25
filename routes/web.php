<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PenerimaanController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [HomeController::class,'index']);


Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::post('obat',[ObatController::class, 'store'])->name('obat.store');
Route::get('/create', [ObatController::class, 'create'])->name('obat.create');
Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::put('/obat/{obat}', [ObatController::class, 'update'])->name('obat.update');
Route::delete('/obat/{obat}', [ObatController::class, 'destroy'])->name('obat.destroy');

Route::post('/obat/import', [ObatController::class, 'import'])->name('obat.import');

Route::get('/search-obat', [ObatController::class, 'search']);
Route::post('/save-penerimaan', [PenerimaanController::class, 'store'])->name('penerimaan.obat.store');

Route::delete('/penerimaan/item', [PenerimaanController::class, 'destroyItem'])->name('penerimaan.item.destroy');



Route::get('/penerimaan/obat', [PenerimaanController::class, 'penerimaanObat'])->name('penerimaan.obat.index');
Route::post('penerimaan/obat',[PenerimaanController::class, 'storePenerimaanObat'])->name('penerimaan.obat.store');
Route::get('/penerimaan/obat/detail/{id}', [PenerimaanController::class, 'detailPenerimaanObat'])->name('penerimaan.obat.detail_penerimaan');

Route::get('/penerimaan/{id}/edit', [PenerimaanController::class, 'edit'])->name('penerimaan.edit');
Route::put('/penerimaan/{penerimaan}', [PenerimaanController::class, 'update'])->name('penerimaan.update');
Route::delete('/penerimaan/{penerimaan}', [PenerimaanController::class, 'destroy'])->name('penerimaan.destroy');


Route::get('/penerimaan_detail/{id}/edit', [PenerimaanController::class, 'editItem'])->name('penerimaan_detail.edit');


