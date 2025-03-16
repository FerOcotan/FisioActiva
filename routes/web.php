<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpedienteController;


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
});

use App\Http\Controllers\UsuariosController;

Route::middleware('auth')->group(function () {
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuarios}', [UsuariosController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{usuarios}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuarios}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuarios}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
});



Route::middleware('auth')->group(function () {

    Route::get('/expediente', [ExpedienteController::class, 'index'])->name('expediente.index');
    Route::get('/expediente/create', [ExpedienteController::class, 'create'])->name('expediente.create');
    Route::post('/expediente', [ExpedienteController::class, 'store'])->name('expediente.store');
    Route::get('/expediente/{expediente}', [ExpedienteController::class, 'show'])->name('expediente.show');
    Route::get('/expediente/{expediente}/edit', [ExpedienteController::class, 'edit'])->name('expediente.edit');
    Route::put('/expediente/{expediente}', [ExpedienteController::class, 'update'])->name('expediente.update');
    Route::delete('/expediente/{expediente}', [ExpedienteController::class, 'destroy'])->name('expediente.destroy');

});


require __DIR__.'/auth.php';
