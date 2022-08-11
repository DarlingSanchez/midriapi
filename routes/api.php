<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\V1\ClienteController;
use App\Http\Controllers\Api\V1\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group( ['middleware' => ["auth:sanctum"]], function(){
    //rutas

    //RUTAS DE CLIENTES
    Route::post('v1/clientes', [ClienteController::class,'store']);
    Route::get('v1/clientes', [ClienteController::class, 'index']);
    Route::get('v1/clientes/{id}', [ClienteController::class, 'edit']);
    Route::post('v1/clientes/update', [ClienteController::class, 'update']);

    //RUTAS DE PRODUCTOS
    Route::get('v1/productos', [ProductoController::class, 'index']);
    Route::post('v1/productos',[ProductoController::class, 'store']);
});

Route::group(['middleware' => ['cors']], function () {
    //Rutas a las que se permitirá acceso
});

// Route::apiResource('v1/clientes',ClienteController::class)
//     ->only(['index','show'])
//     ->middleware(['auth:sanctum', 'ability:check-status,place-orders']);


//Route::post('v1/clientes', ClienteController::class)->only('store');


Route::post('login', [LoginController::class, 'login']);

Route::post('register', [LoginController::class, 'register']);