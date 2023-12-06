<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TipodocController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZonaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/users/profile/{user}', [UserController::class, 'profile'])->name('users.profile');
    Route::get('users/asignaRol/{user}', [UserController::class, 'asinaRol'])->name('users.asignaRol');
    Route::put('users/updateRol/{user}', [UserController::class, 'updateRol'])->name('users.updateRol');


    Route::resource('users', UserController::class)->names('users');
    Route::resource('roles', RoleController::class)->middleware('auth')->names('admin.roles');
    Route::resource('zonas',ZonaController::class)->names('zonas');
    Route::resource('tipodocs',TipodocController::class)->names('tipodocs');
    Route::resource('objetivos',ObjetivoController::class)->names('objetivos');
    Route::resource('clientes',ClienteController::class)->names('clientes');
    Route::get('clientes/statuschange/{id}',[ClienteController::class,'statuschange'])->name('clientes.statuschange');
});
