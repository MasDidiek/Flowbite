<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users', [UserController::class, 'index'])->name('users');
});


Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::post('obat',[ObatController::class, 'store'])->name('obat.store');
Route::get('/create', [ObatController::class, 'create'])->name('obat.create');
Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::put('/obat/{obat}', [ObatController::class, 'update'])->name('obat.update');
Route::delete('/obat/{obat}', [ObatController::class, 'destroy'])->name('obat.destroy');

Route::post('/obat/import', [ObatController::class, 'import'])->name('obat.import');

Route::get('/search-obat', [ObatController::class, 'search']);
Route::post('/save-penerimaan', [PenerimaanController::class, 'simpanPenerimaan'])->name('penerimaan.obat.store');

Route::get('/penerimaan/obat', [PenerimaanController::class, 'penerimaanObat'])->name('penerimaan.obat.index');
Route::post('penerimaan/obat',[PenerimaanController::class, 'storePenerimaanObat'])->name('penerimaan.obat.store');
Route::get('/penerimaan/obat/detail/{id}', [PenerimaanController::class, 'detailPenerimaanObat'])->name('penerimaan.obat.detail_penerimaan');

Route::delete('/penerimaan/item/{PenerimaanDetail}', [PenerimaanController::class, 'destroyItem'])->name('penerimaan.item.destroy');


Route::get('/penerimaan/{id}/edit', [PenerimaanController::class, 'edit'])->name('penerimaan.edit');
Route::put('/penerimaan/{penerimaan}', [PenerimaanController::class, 'update'])->name('penerimaan.update');
Route::delete('/penerimaan/{penerimaan}', [PenerimaanController::class, 'destroy'])->name('penerimaan.destroy');


Route::get('/penerimaan_detail/{id}/edit', [PenerimaanController::class, 'editItem'])->name('penerimaan_detail.edit');


Route::get('/permintaan', [PermintaanController::class, 'index'])->name('permintaan.index');
require __DIR__.'/auth.php';
