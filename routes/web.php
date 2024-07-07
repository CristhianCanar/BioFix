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

/* Dashboard Module */
Route::get('/',          [HomeController::class, 'index'])->middleware('auth');
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/**
 * Usuarios
 */
Route::middleware(['auth', 'can:usuarios_ver'])->name('usuarios.')->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('index');

    Route::get('/usuario/create', [UsuarioController::class, 'create'])->middleware(['can:usuarios_registrar'])->name('create');
    Route::post('/usuario', [UsuarioController::class, 'store'])->middleware(['can:usuarios_registrar'])->name('store');

    Route::get('/usuario/{id}', [UsuarioController::class, 'show'])->name('show');

    Route::get('/usuario/{id}/edit', [UsuarioController::class, 'edit'])->middleware(['can:usuarios_editar'])->name('edit');
    Route::put('/usuario/{id}', [UsuarioController::class, 'update'])->middleware(['can:usuarios_editar'])->name('update');

    Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy'])->middleware(['can:usuarios_eliminar'])->name('destroy');
});

/**
 * Responsables equipos
 */
Route::middleware(['auth', 'can:responsables_equipos_ver'])->name('responsables_equipos.')->group(function () {
    Route::get('/responsables_equipos', [ResponsableEquipoController::class, 'index'])->name('index');

    Route::get('/responsable_equipo/create', [ResponsableEquipoController::class, 'create'])->middleware(['can:responsables_equipos_registrar'])->name('create');
    Route::post('/responsable_equipo', [ResponsableEquipoController::class, 'store'])->middleware(['can:responsables_equipos_registrar'])->name('store');

    Route::get('/responsable_equipo/{id}', [ResponsableEquipoController::class, 'show'])->name('show');

    Route::get('/responsable_equipo/{id}/edit', [ResponsableEquipoController::class, 'edit'])->middleware(['can:responsables_equipos_editar'])->name('edit');
    Route::put('/responsable_equipo/{id}', [ResponsableEquipoController::class, 'update'])->middleware(['can:responsables_equipos_editar'])->name('update');

    Route::delete('/responsable_equipo/{id}', [ResponsableEquipoController::class, 'destroy'])->middleware(['can:responsables_equipos_eliminar'])->name('destroy');
});

/**
 * Responsables mantenimientos
 */
Route::middleware(['auth', 'can:responsables_mantenimientos_ver'])->name('responsables_mantenimientos.')->group(function () {
    Route::get('/responsables_mantenimientos', [ResponsableMantenimientoController::class, 'index'])->name('index');

    Route::get('/responsable_mantenimiento/create', [ResponsableMantenimientoController::class, 'create'])->middleware(['can:responsables_mantenimientos_registrar'])->name('create');
    Route::post('/responsable_mantenimiento', [ResponsableMantenimientoController::class, 'store'])->middleware(['can:responsables_mantenimientos_registrar'])->name('store');

    Route::get('/responsable_mantenimiento/{id}', [ResponsableMantenimientoController::class, 'show'])->name('show');

    Route::get('/responsable_mantenimiento/{id}/edit', [ResponsableMantenimientoController::class, 'edit'])->middleware(['can:responsables_mantenimientos_editar'])->name('edit');
    Route::put('/responsable_mantenimiento/{id}', [ResponsableMantenimientoController::class, 'update'])->middleware(['can:responsables_mantenimientos_editar'])->name('update');

    Route::delete('/responsable_mantenimiento/{id}', [ResponsableMantenimientoController::class, 'destroy'])->middleware(['can:responsables_mantenimientos_eliminar'])->name('destroy');
});

/**
 * Empresas
 */
Route::middleware(['auth', 'can:empresas_ver'])->group(function () {
    Route::resource('empresas', EmpresaController::class);
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
Route::middleware(['auth', 'can:dar_de_baja_ver'])->name('unsubscribe.')->group(function () {
    Route::get('/unsubscribe', [UnsubscribeController::class, 'index'])->middleware(['can:equipos_dar_de_baja'])->name('index');

    Route::get('/unsubscribe/{equipoId}/create', [UnsubscribeController::class, 'create'])->middleware(['can:dar_de_baja_registrar'])->name('create');
    Route::post('/unsubscribe/{equipoId}', [UnsubscribeController::class, 'store'])->middleware(['can:dar_de_baja_registrar'])->name('store');

    Route::get('/unsubscribe/{id}', [UnsubscribeController::class, 'show'])->name('show');

    Route::get('/observations', [UnsubscribeController::class, 'indexObservation'])->name('index.observation');
    Route::get('/observation/{id}', [UnsubscribeController::class, 'showObservation'])->name('show.observation');
    Route::get('/observation/equipo/{id}', [UnsubscribeController::class, 'createObservation'])->name('create.observation');
    Route::post('/observation/equipo/{equipoId}', [UnsubscribeController::class, 'storeObservation'])->name('store.observation');
});

/**
 * Matenimientos
 */
Route::middleware('auth')->group(function () {
    Route::get('mantenimientos', [MantenimientoController::class, 'createMantenimiento'])->name('mantenimientos.create');
    Route::post('mantenimientos', [MantenimientoController::class, 'storeMantenimiento'])->name('mantenimientos.store');
    Route::get('mantenimientos/{equipoId}', [MantenimientoController::class, 'showMantenimientoByEquipoId'])->name('mantenimientos.show.equipo');
});
