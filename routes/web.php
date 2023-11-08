<?php

use App\Http\Controllers\CityController;
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

Route::get('/', [CityController::class, 'index'])->name('index');
Route::get('/county/{id}', [CityController::class, 'getCities']);
Route::post('/county/city/create', [CityController::class, 'create']);
Route::post('/county/city/update/{id}', [CityController::class, 'update']);
