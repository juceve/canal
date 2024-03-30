<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ContexturaController;
use App\Http\Controllers\CouchController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\FeriadoController;
use App\Http\Controllers\ImpresionController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SuscripcioneController;
use App\Http\Controllers\TipodocController;
use App\Http\Controllers\TiposervicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VntventaController;
use App\Http\Controllers\ZonaController;
use App\Http\Livewire\Acuentacli;
use App\Http\Livewire\Fotosclientes;
use App\Http\Livewire\Horarioservicios;
use App\Http\Livewire\Impresiones\Recibosuscripcion;
use App\Http\Livewire\LicenciasCliente;
use App\Http\Livewire\Pos;
use App\Http\Livewire\Pruebas;
use App\Http\Livewire\Vntsuscripciones;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/users/profile/{user}', [UserController::class, 'profile'])->middleware('can:users.edit')->name('users.profile');
    Route::get('users/asignaRol/{user}', [UserController::class, 'asinaRol'])->middleware('can:users.edit')->name('users.asignaRol');
    Route::put('users/updateRol/{user}', [UserController::class, 'updateRol'])->middleware('can:users.edit')->name('users.updateRol');

    Route::get('clientes/statuschange/{id}', [ClienteController::class, 'statuschange'])->middleware('can:clientes.edit')->name('clientes.statuschange');
    Route::get('clientes/fotos/{cliente_id}', Fotosclientes::class)->middleware('can:clientes.edit')->name('fotosclientes');
    Route::get('admin/suscripcion-cliente', Vntsuscripciones::class)->name('ventas.suscripciones');
    Route::get('servicios/horarios/{servicio_id}', Horarioservicios::class)->middleware('can:servicios.edit')->name('servicios.horarios');
    Route::get('admin/puntoventa', Pos::class)->name('pos');
    Route::get('admin/licencias-cliente/{cliente_id}', LicenciasCliente::class)->name('licenciascliente');
    Route::get('admin/creditos', Acuentacli::class)->name('acuentas');

    Route::resource('admin/users', UserController::class)->names('users');
    Route::resource('admin/roles', RoleController::class)->middleware('auth')->names('admin.roles');
    Route::resource('admin/zonas', ZonaController::class)->names('zonas');
    Route::resource('admin/tipodocs', TipodocController::class)->names('tipodocs');
    Route::resource('admin/objetivos', ObjetivoController::class)->names('objetivos');
    Route::resource('admin/clientes', ClienteController::class)->names('clientes');
    Route::resource('admin/tiposervices', TiposervicioController::class)->names('tiposervicios');
    Route::resource('admin/servicios', ServicioController::class)->names('servicios');
    Route::resource('admin/suscripciones', SuscripcioneController::class)->names('suscripciones');
    Route::resource('admin/contexturas', ContexturaController::class)->names('contexturas');
    Route::resource('admin/ventas', VntventaController::class)->names('vntventas');
    Route::resource('admin/feriados', FeriadoController::class)->names('feriados');
    Route::resource('admin/couches', CouchController::class)->names('couches');
    Route::resource('admin/movimientos', MovimientoController::class)->names('movimientos');
    Route::resource('admin/cuentas', CuentaController::class)->names('cuentas');

    Route::resource('admin/categorias', CategoriaController::class)->names('categorias');
    Route::resource('admin/productos', ProductoController::class)->names('productos');
    Route::resource('admin/compras', CompraController::class)->names('compras');
    Route::post('admin/compras/{id}/anular', [CompraController::class, 'anular'])->name('compras.anular');





    Route::get('pruebas', Pruebas::class)->name('pruebas');
});
