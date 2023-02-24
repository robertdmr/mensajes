<?php

use App\Http\Controllers\PersonsController;
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
Route::get('formulario', function () {
    return view('formulario');
})->name('formulario');

Route::post('whatsapp', [PersonsController::class,'whatsapp'])->name('whatsapp');
Route::get('gracias/', [PersonsController::class,'gracias'])->name('gracias');
