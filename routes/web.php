<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BukuController::class, 'index'])->name('index');
Route::get('/detail/{id}', [BukuController::class, 'PublicDetail'])->name('detail');

Route::group(['middleware' => ['web']], function () {
  Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [BukuController::class, 'DashboardIndex'])->name('index');

    Route::get('/create', [KategoriController::class, 'GetKategori'])->name('create');
    Route::post('/create', [BukuController::class, 'store'])->name('store');

    Route::get('/edit/{id}', [BukuController::class, 'DashboardDetail'])->name('edit');
    Route::put('/edit/{id}', [BukuController::class, 'update'])->name('update');

    Route::delete('/delete/{id}', [BukuController::class, 'delete'])->name('delete');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
  });
});
