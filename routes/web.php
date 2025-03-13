<?php

use App\Http\Controllers\TcnCandidatoController;
use Illuminate\Support\Facades\Route;

Route::get('/registrer', [TcnCandidatoController::class, 'create'])->name('candidatos.create');

// Ruta para guardar el candidato (POST)
Route::post('/candidatos', [TcnCandidatoController::class, 'store'])->name('candidatos.store');

Route::get('/informacion', function () {
    return view('informacion');
})->name('informacion');

