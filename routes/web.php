<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\HomeController;

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

Route::get('/index',[HomeController::class,'index'])->name('index');
Route::get('/listar_cuotas/{id}',[CuotaController::class,'listar_cuotas_alumnos'])->name('listar_cuotas_alumnos');
Route::get('/pay/{id_cuota}',[CuotaController::class,'mostrar_frm_pago'])->name('pay');
Route::post('/pagar',[PagoController::class,'verificar_pago'])->name('pagar');