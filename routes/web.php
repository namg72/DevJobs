<?php

use App\Http\Controllers\CrearVacanteeControler;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteControler;
use App\Livewire\MostrarVacantes;
use Illuminate\Support\Facades\Route;
use Mockery\CountValidator\AtMost;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vacantes', [VacanteControler::class, 'index'])->middleware(['auth', 'verified'])->name('vacantes.index');
Route::get('/vacantes/create', [VacanteControler::class, 'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit', [VacanteControler::class, 'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
