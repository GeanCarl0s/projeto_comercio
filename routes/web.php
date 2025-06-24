<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Models\Cidade;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
    Route::resource('clientes', ClienteController::class);
    Route::get('/cidades/{id_estado}', function ($id_estado) {
        return Cidade::where('id_estado', $id_estado)->orderBy('nome')->get();
    });
    Route::get('clientes/{cliente}/exportar-json', [ClienteController::class, 'exportarJson'])->name('clientes.exportarJson');
    Route::get('usuarios/novo', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('usuarios', [UserController::class, 'store'])->name('usuarios.store');
    Route::get('usuarios/{user}/editar', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('usuarios/{user}', [UserController::class, 'update'])->name('usuarios.update');
});