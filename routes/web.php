<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\TrabajoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/panel', [DashboardController::class, 'mostrarPanel'])->name('dashboard');

    Route::get('/servicios', [TrabajoController::class, 'listar'])->name('trabajos.index');

    Route::middleware('role:usuario')->group(function () {
        Route::get('/servicios/{trabajo}/reservar', [ReservaController::class, 'crear'])->name('reservas.create');
        Route::post('/servicios/{trabajo}/reservar', [ReservaController::class, 'guardar'])->name('reservas.store');
        Route::get('/mis-reservas', [ReservaController::class, 'mis'])->name('reservas.mis');
    });

    Route::middleware('role:empleado,administrador')->group(function () {
        Route::get('/reservas', [ReservaController::class, 'listar'])->name('reservas.index');
        Route::patch('/reservas/{reserva}/aceptar', [ReservaController::class, 'aceptar'])->name('reservas.aceptar');
        Route::patch('/reservas/{reserva}/rechazar', [ReservaController::class, 'rechazar'])->name('reservas.rechazar');
        Route::get('/servicios/crear', [TrabajoController::class, 'crear'])->name('trabajos.create');
        Route::get('/servicios/{trabajo}/editar', [TrabajoController::class, 'editar'])->name('trabajos.edit');
        Route::post('/servicios', [TrabajoController::class, 'guardar'])->name('trabajos.store');
        Route::patch('/servicios/{trabajo}', [TrabajoController::class, 'actualizar'])->name('trabajos.update');
        Route::delete('/servicios/{trabajo}', [TrabajoController::class, 'eliminar'])->name('trabajos.destroy');
    });

    Route::middleware('role:administrador')->group(function () {
        Route::get('/usuarios', [DashboardController::class, 'listarUsuarios'])->name('usuarios.index');
        Route::patch('/usuarios/{user}', [DashboardController::class, 'actualizarUsuario'])->name('usuarios.update');
    });

    Route::get('/perfil', [ProfileController::class, 'editar'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'actualizar'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'eliminar'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
