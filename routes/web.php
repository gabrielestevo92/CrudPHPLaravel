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

use App\Http\Controllers\ClientesController;

Route::get('/login', function (){
    return redirect("/clientes");
});

Route::get('/', [ClientesController::class, 'index']);

Route::get('/clientes', [ClientesController::class, 'clientes']);

Route::post('/salvar', [ClientesController::class, 'salvar']);

Route::delete('/destroy/{id}', [ClientesController::class, 'destroy'])->middleware('auth');

Route::put('clientes/update/{id}', [ClientesController::class, 'update']);

Route::get('/cliente/{id}', [ClientesController::class, 'cliente'])->middleware('auth');

Route::get('/maps', [ClientesController::class, 'maps']);

