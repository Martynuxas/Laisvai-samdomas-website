<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VartotojaiController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kontaktai', function () {
    return view('kontaktai');
})->name('kontaktai');

Route::get('/ieskoti', function () {
    return view('ieskoti');
})->name('ieskoti');

Route::get('/klausti', function () {
    return view('klausti');
})->name('klausti');

Route::get('/kurti', function () {
    return view('kurti');
})->name('kurti');

Route::get('/pasiulymai', function () {
    return view('pasiulymai');
})->name('pasiulymai');
Route::get('/uzklausa', [App\Http\Controllers\UzklausaController::class, 'index'])->name('uzklausa');


//tables
Route::get('/isiminti', [App\Http\Controllers\IsimintiController::class, 'index'])->name('isiminti');
Route::get('/kategorijos', [App\Http\Controllers\KategorijosController::class, 'index'])->name('kategorijos');
Route::get('/prenumeratos', [App\Http\Controllers\PrenumeratosController::class, 'index'])->name('prenumeratos');
Route::get('/statusai', [App\Http\Controllers\StatusaiController::class, 'index'])->name('statusai');
Route::get('/vartotojai', [App\Http\Controllers\VartotojaiController::class, 'index'])->name('vartotojai');
Route::get('/skelbimai', [App\Http\Controllers\SkelbimaiController::class, 'index'])->name('skelbimai');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
