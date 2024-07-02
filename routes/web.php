<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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
require __DIR__.'/auth.php';

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
Route::middleware(['auth','can:usuarios_ver'])->name('usuarios.')->group(function (){
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('index');

    Route::get('/usuario/create', [UsuarioController::class, 'create'])->middleware(['can:usuarios_registrar'])->name('create');
    Route::post('/usuario', [UsuarioController::class, 'store'])->middleware(['can:usuarios_registrar'])->name('store');

    Route::get('/usuario/{id}', [UsuarioController::class, 'show'])->name('show');

    Route::get('/usuario/{id}/edit', [UsuarioController::class, 'edit'])->middleware(['can:usuarios_editar'])->name('edit');
    Route::put('/usuario/{id}', [UsuarioController::class, 'update'])->middleware(['can:usuarios_editar'])->name('update');

    Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy'])->middleware(['can:usuarios_eliminar'])->name('destroy');
});

/**
 * Empresas
 */
Route::middleware(['auth','can:empresas_ver'])->group(function (){
    Route::resource('empresas', EmpresaController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('equipos', EquipoController::class);
    Route::get('empresas/municipios/{departamento_id}', [EmpresaController::class, 'getMunicipios'])->name('empresas.get_municipios');

});
