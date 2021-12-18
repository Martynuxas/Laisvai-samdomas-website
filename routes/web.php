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

//Kategorijos
Route::post('submit',[App\Http\Controllers\KategorijosController::class, 'insertKategorijos']);
Route::get('/deleteKategorijas/{id}', [App\Http\Controllers\KategorijosController::class, 'deleteKategorijos']);
Route::get('/kategorijosEdit/{id}',[App\Http\Controllers\KategorijosController::class, 'showData']);
Route::post('update',[App\Http\Controllers\KategorijosController::class, 'update']);

//Isiminti
Route::post('submitIsimintus',[App\Http\Controllers\IsimintiController::class, 'insertIsimintus']);
Route::get('/deleteIsimintus/{id}', [App\Http\Controllers\IsimintiController::class, 'deleteIsimintus']);
Route::get('/isimintiEdit/{id}',[App\Http\Controllers\IsimintiController::class, 'showData']);
Route::post('updateIsimintus',[App\Http\Controllers\IsimintiController::class, 'update']);

//Prenumeratos
Route::post('submitPrenumeratas',[App\Http\Controllers\PrenumeratosController::class, 'insertPrenumeratas']);
Route::get('/deletePrenumeratas/{id}', [App\Http\Controllers\PrenumeratosController::class, 'deletePrenumeratas']);
Route::get('/prenumeratosEdit/{id}',[App\Http\Controllers\PrenumeratosController::class, 'showData']);
Route::post('updatePrenumaratas',[App\Http\Controllers\PrenumeratosController::class, 'update']);

//Statusai
Route::post('submitStatusus',[App\Http\Controllers\StatusaiController::class, 'insertStatusus']);
Route::get('/deleteStatusus/{id}', [App\Http\Controllers\StatusaiController::class, 'deleteStatusus']);
Route::get('/skelbimo_statusasEdit/{id}',[App\Http\Controllers\StatusaiController::class, 'showData']);
Route::post('updateStatusus',[App\Http\Controllers\StatusaiController::class, 'update']);

//Vartotojai
Route::post('submitVartotojus',[App\Http\Controllers\VartotojaiController::class, 'insertVartotojus']);
Route::get('/deleteVartotojus/{id}', [App\Http\Controllers\VartotojaiController::class, 'deleteVartotojus']);
Route::get('/vartotojaiEdit/{id}',[App\Http\Controllers\VartotojaiController::class, 'showData']);
Route::post('updateVartotojus',[App\Http\Controllers\VartotojaiController::class, 'update']);

//Skelbimai
Route::post('submitSkelbimus',[App\Http\Controllers\SkelbimaiController::class, 'insertSkelbimus']);
Route::get('/isimintiSkelbima/{id}',[App\Http\Controllers\IsimintiController::class, 'insertIsiminta']);
Route::get('/deleteSkelbimus/{id}', [App\Http\Controllers\SkelbimaiController::class, 'deleteSkelbimus']);
Route::get('/skelbimaiEdit/{id}',[App\Http\Controllers\SkelbimaiController::class, 'showData']);
Route::post('updateSkelbimus',[App\Http\Controllers\SkelbimaiController::class, 'update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
