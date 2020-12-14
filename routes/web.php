<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Ruta para mostrar la pantalla para realizar transacciones
Route::middleware(['auth:sanctum', 'verified'])->get('/tr', function () {
    return view('transacciones');
})->name('tr.mostrar');

// RUTA PARA VER EL SERVICIO DE PAGO DE SERVICIOS
Route::middleware(['auth:sanctum', 'verified'])->get('/tr/ps', function () {
    return view('livewire.transacciones.pago_servicio');
})->name('pago.servicio');

// RUTA PARA LA PAGINA DEL USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// RUTA PARA LA PAGINA DEL ADMINISTRADOR
Route::middleware(['auth:sanctum', 'verified', 'role:super_admin'])->get('/admin', function () {
    return view('admin');
})->name('/admin');


// RUTA PARA VER LA VISTA DE LA TABLA DE USUARIOS DEL ADMINISTRADOR
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/usuarios',function (){
    return view('livewire.admin.usuarios');
})->name('/usuarios');

// RUTA PARA VER LA VISTA DE LA TABLA DE RETIROS DEL ADMINISTRADOR
Route::middleware(['auth:sanctum', 'verified'])->get('/retiros',function (){
    return view('livewire.admin.retiros');
})->name('/retiros');

// RUTA PARA VER LA VISTA DE LA TABLA DE DEPOSITOS DEL ADMINISTRADOR
Route::middleware(['auth:sanctum', 'verified'])->get('/depositos',function (){
    return view('livewire.admin.depositos');
})->name('/depositos');

// RUTA PARA VER LA VISTA DE LA TABLA DE PAGO DE SERVICIOS DEL ADMINISTRADOR
Route::middleware(['auth:sanctum', 'verified'])->get('/pago',function (){
    return view('livewire.admin.pagos');
})->name('/pago');

// RUTA PARA VER LA VISTA DE LA TABLA DE ENVIO DE DINERO DEL ADMINISTRADOR
Route::middleware(['auth:sanctum', 'verified'])->get('/envios',function (){
    return view('livewire.admin.envios');
})->name('/envios');

// RUTA PARA VER LAS TABLAS DE MOVIMIENTOS EN LA PAGINA DEL USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('/movimientos',function (){
    return view('movimientos');
})->name('/movimientos');

// RUTA PARA VER LA VISTA DE LA TABLA DE RETIROS DEL USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('/retiroscliente',function (){
    return view('livewire.movimientos.retiros_cliente_index');
})->name('/retiroscliente');

// RUTA PARA VER LA VISTA DE LA TABLA DE DEPOSITOS DEL USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('/depositoscliente',function (){
    return view('livewire.movimientos.depositos_cliente_index');
})->name('/depositoscliente');

// RUTA PARA VER LA VISTA DE LA TABLA DE PAGO DE SERVICIOS DEL USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('/pagoscliente',function (){
    return view('livewire.movimientos.pago_cliente_index');
})->name('/pagoscliente');

// RUTA PARA VER LA VISTA DE LA TABLA DE ENVIO DE DINERO DEL USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('/envioscliente',function (){
    return view('livewire.movimientos.envio_cliente_index');
})->name('/envioscliente');

// RUTA PARA VER LA VISTA DE LA TABLA DE DINERO RECIBIDO DEL USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('/recibidoscliente',function (){
    return view('livewire.movimientos.recibidos_cliente_index');
})->name('/recibidoscliente');

// RUTA PARA VER EL SERVICIO DE ENVIO DE DINERO
Route::middleware(['auth:sanctum', 'verified'])->get('/servicioenviodinero',function (){
    return view('livewire.transacciones.servicio_envio_dinero');
})->name('/servicioenviodinero');

//ruta para realizar los retiros, con el boton efectuar retiro
Route::middleware(['auth:sanctum', 'verified'])->get('/servicioretiros',function (){
    return view('livewire.admin.servicio_retiros_admin');
})->name('/servicioretiros');

// RUTA PARA LA TABLA DE USUARIOS EN LA VISTA ADMIN
Route::middleware(['auth:sanctum', 'verified'])->get('/usuariosadmin',function (){
    return view('livewire.admin.usuario_index');
})->name('/usuariosadmin');





// RUTA PARA EFECTUAR DEPOSITOS
Route::middleware(['auth:sanctum', 'verified', 'role:super_admin'])->get('/deposito_admin', function () {
    return view('livewire.admin.efectura_deposito');
})->name('efectuar.deposito');


use App\Http\Controllers\DepositoController;

Route::middleware(['auth:sanctum', 'verified'])->get('/tr/de/',
[DepositoController::class ,'index'])->name('deposito.efectivo');

Route::middleware(['auth:sanctum', 'verified'])->put('/tr/de/{id}',
[DepositoController::class ,'update'])->name('deposito.update');



