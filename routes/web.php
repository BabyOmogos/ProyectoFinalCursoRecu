<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrabajoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/panel', [DashboardController::class, 'mostrarPanel'])->name('dashboard');

    Route::get('/servicios', [TrabajoController::class, 'listar'])->name('trabajos.index');

    Route::middleware('role:empleado,administrador')->group(function () {
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
