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
Route::middleware(['auth:sanctum', 'verified'])->get('/tr/ps', function () {
    return view('livewire.transacciones.pago_servicio');
})->name('pago.servicio');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin');
})->name('/admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/retiros',function (){
    return view('livewire.admin.retiros');

})->name('/retiros');


Route::middleware(['auth:sanctum', 'verified'])->get('/depositos',function (){
    return view('livewire.admin.depositos');

})->name('/depositos');

Route::middleware(['auth:sanctum', 'verified'])->get('/pago',function (){
    return view('livewire.admin.pagos');

})->name('/pago');

Route::middleware(['auth:sanctum', 'verified'])->get('/envios',function (){
    return view('livewire.admin.envios');

})->name('/envios');


