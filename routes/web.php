<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\V1\ClienteResourse;
use App\Models\Clientes;

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
    return "Api de midri";
});

Route::get('/mes', function(){
    return view('welcome');
});

Route::get('/saludo', function() {
    return ClienteResourse::collection(Clientes::all());
});
Route::get('/install', function() {
    //Artisan::call('migrate');
});