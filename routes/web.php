<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\ResponsableEquipoController;
use App\Http\Controllers\ResponsableMantenimientoController;
use App\Http\Controllers\UnsubscribeController;
use App\Http\Controllers\UsuarioController;
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

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Dashboard Module */
Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('dashboard');

/**
 * Usuarios
 */
Route::middleware(['auth'])->name('usuarios.')->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'index'])->middleware(['can:users_gestionar'])->name('index');
    Route::middleware(['can:users_registrar'])->group(function () {
        Route::get('/usuario/create', [UsuarioController::class, 'create'])->name('create');
        Route::post('/usuario', [UsuarioController::class, 'store'])->name('store');
    });
    Route::get('/usuario/{id}', [UsuarioController::class, 'show'])->middleware(['can:users_ver'])->name('show');
    Route::middleware(['can:users_editar'])->group(function () {
        Route::get('/usuario/{id}/edit', [UsuarioController::class, 'edit'])->name('edit');
        Route::put('/usuario/{id}', [UsuarioController::class, 'update'])->name('update');
    });
    Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy'])->middleware(['can:users_eliminar'])->name('destroy');
});

/**
 * Responsables equipos
 */
Route::middleware(['auth'])->name('responsables_equipos.')->group(function () {
    Route::get('/responsables_equipos', [ResponsableEquipoController::class, 'index'])->middleware(['can:responsable_equipo_gestionar'])->name('index');
    Route::middleware(['can:responsable_equipo_registrar'])->group(function () {
        Route::get('/responsable_equipo/create', [ResponsableEquipoController::class, 'create'])->middleware(['can:responsable_equipo_registrar'])->name('create');
        Route::post('/responsable_equipo', [ResponsableEquipoController::class, 'store'])->middleware(['can:responsable_equipo_registrar'])->name('store');
    });
    Route::get('/responsable_equipo/{id}', [ResponsableEquipoController::class, 'show'])->middleware(['can:responsable_equipo_ver'])->name('show');
    Route::middleware(['can:responsable_equipo_editar'])->group(function () {
        Route::get('/responsable_equipo/{id}/edit', [ResponsableEquipoController::class, 'edit'])->middleware(['can:responsable_equipo_editar'])->name('edit');
        Route::put('/responsable_equipo/{id}', [ResponsableEquipoController::class, 'update'])->middleware(['can:responsable_equipo_editar'])->name('update');
    });
    Route::delete('/responsable_equipo/{id}', [ResponsableEquipoController::class, 'destroy'])->middleware(['can:responsable_equipo_eliminar'])->name('destroy');
});

/**
 * Responsables mantenimientos
 */
Route::middleware(['auth'])->name('responsables_mantenimientos.')->group(function () {
    Route::get('/responsables_mantenimientos', [ResponsableMantenimientoController::class, 'index'])->middleware(['can:responsable_mantenimiento_gestionar'])->name('index');
    Route::middleware(['can:responsable_mantenimiento_registrar'])->group(function () {
        Route::get('/responsable_mantenimiento/create', [ResponsableMantenimientoController::class, 'create'])->name('create');
        Route::post('/responsable_mantenimiento', [ResponsableMantenimientoController::class, 'store'])->name('store');
    });
    Route::get('/responsable_mantenimiento/{id}', [ResponsableMantenimientoController::class, 'show'])->middleware(['can:responsable_mantenimiento_ver'])->name('show');
    Route::middleware(['can:responsable_mantenimiento_editar'])->group(function () {
        Route::get('/responsable_mantenimiento/{id}/edit', [ResponsableMantenimientoController::class, 'edit'])->name('edit');
        Route::put('/responsable_mantenimiento/{id}', [ResponsableMantenimientoController::class, 'update'])->name('update');
    });
    Route::delete('/responsable_mantenimiento/{id}', [ResponsableMantenimientoController::class, 'destroy'])->middleware(['can:responsable_mantenimiento_eliminar'])->name('destroy');
});

/**
 * Empresas
 */
Route::middleware(['auth'])->group(function () {
    Route::resource('empresas', EmpresaController::class)->middleware(['can:empresa_gestionar','can:empresa_registrar']);
});

/**
 * Equipos
 */
Route::middleware('auth')->group(function () {
    Route::resource('equipos', EquipoController::class);
    Route::get('empresas/municipios/{departamento_id}', [EmpresaController::class, 'getMunicipios'])->name('empresas.get_municipios');
});

/**
 * Dar de baja
 */
Route::middleware(['auth'])->name('unsubscribe.')->group(function () {
    Route::middleware(['can:dar_baja_gestionar'])->group(function () {
        Route::get('/unsubscribe', [UnsubscribeController::class, 'index'])->name('index');
        Route::get('/unsubscribe/{id}', [UnsubscribeController::class, 'show'])->name('show');
    });
    Route::middleware(['can:dar_baja_registrar'])->group(function () {
        Route::get('/unsubscribe/{equipoId}/create', [UnsubscribeController::class, 'create'])->name('create');
        Route::post('/unsubscribe/{equipoId}', [UnsubscribeController::class, 'store'])->name('store');
    });
    Route::middleware(['can:observacion_dar_baja_registrar'])->group(function () {
        Route::get('/observation/equipo/{id}', [UnsubscribeController::class, 'createObservation'])->name('create.observation');
        Route::post('/observation/equipo/{equipoId}', [UnsubscribeController::class, 'storeObservation'])->name('store.observation');
    });
    Route::middleware(['can:observacion_dar_baja_gestionar'])->group(function () {
        Route::get('/observations', [UnsubscribeController::class, 'indexObservation'])->name('index.observation');
        Route::get('/observation/{id}', [UnsubscribeController::class, 'showObservation'])->name('show.observation');
    });
});

/**
 * Matenimientos
 */
Route::middleware('auth')->group(function () {
    Route::middleware(['can:mantenimiento_registrar'])->group(function () {
        Route::get('mantenimientos', [MantenimientoController::class, 'createMantenimiento'])->name('mantenimientos.create');
        Route::post('mantenimientos', [MantenimientoController::class, 'storeMantenimiento'])->name('mantenimientos.store');
    });
    Route::get('mantenimientos/{equipoId}', [MantenimientoController::class, 'showMantenimientoByEquipoId'])->middleware(['can:mantenimiento_ver'])->name('mantenimientos.show.equipo');
});
