<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VartotojaiController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Mail\Notification;
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

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/kontaktai', function () {
    return view('kontaktai');
})->name('kontaktai');

Route::get('/ieskoti', function () {
    return view('ieskoti');
})->name('ieskoti');

Route::get('/klausti', function () {
    return view('klausti');
})->name('klausti');

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
Route::get('/deleteIsimintaVartotoja/{id}', [App\Http\Controllers\IsimintiController::class, 'deleteIsimintaVartotoja']);
Route::get('/deleteIsimintaPaslauga/{id}', [App\Http\Controllers\IsimintiController::class, 'deleteIsimintaPaslauga']);
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

// Google login
Route::get('login/google', [App\Http\Controllers\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\LoginController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('login/facebook', [App\Http\Controllers\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\LoginController::class, 'handleFacebookCallback']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kalendorius', [App\Http\Controllers\FullCalenderController::class, 'index']);
Route::post('kalendorius/action', [App\Http\Controllers\FullCalenderController::class, 'action']);

Route::post('fileUpload',[App\Http\Controllers\ProfilisEditController::class, 'profilisUpload']);
Route::get('/profilis/{id}', [App\Http\Controllers\ProfilisController::class, 'index'])->name('profilis');
Route::get('/profilisEdit', [App\Http\Controllers\ProfilisEditController::class, 'index'])->name('profilisEdit');

Route::get('/paslaugos', [App\Http\Controllers\PaslaugosController::class, 'index'])->name('paslaugos');
Route::get('/manoKambarys', [App\Http\Controllers\VaizdoController::class, 'index'])->name('manoKambarys');

Route::get('/kurti', [App\Http\Controllers\KurtiController::class, 'index'])->name('kurti');
Route::post('kurtiUzklausa',[App\Http\Controllers\KurtiController::class, 'insertUzklausa']);

Route::get('/paslauga', [App\Http\Controllers\PaslaugosController::class, 'index'])->name('paslauga');

Route::get('/suma', function () {
    return view('pasirinktiSuma');
})->name('suma');

Route::get('mokejimas','App\Http\Controllers\MokejimasController@mokejimas')->name('mokejimas');
Route::post('mokejimas','App\Http\Controllers\MokejimasController@poMokejimo');
Route::post('mokejimasRed','App\Http\Controllers\MokejimasController@mokejimasRed');
Route::post('/process',[App\Http\Controllers\PaymentController::class, 'paymentAction'])->name('payment_process');

Route::get('/pranesimai', [App\Http\Controllers\PranesimaiController::class, 'index'])->name('pranesimai');

Route::get('/kurtiPaslauga', [App\Http\Controllers\KurtiController::class, 'indexPaslauga'])->name('kurtiPaslauga');
Route::post('kurtiPaslauga/upload', 'ImageUploadController@upload')->name('dropzone.upload');

Route::get('kurtiPaslauga/fetch', 'ImageUploadController@fetch')->name('dropzone.fetch');

Route::get('kurtiPaslauga/delete', 'ImageUploadController@delete')->name('dropzone.delete');

Route::get('/isiminti', [App\Http\Controllers\IsimintiController::class, 'getLists'])->name('isiminti');

Route::get('/tab1', [App\Http\Controllers\IsimintiController::class, 'getLists']);
Route::get('/tab2', [App\Http\Controllers\IsimintiController::class, 'getLists']);

Route::post('submitAtsiliepima',[App\Http\Controllers\ProfilisController::class, 'insertAtsiliepima']);
Route::get('/deleteAtsiliepima/{id}', [App\Http\Controllers\ProfilisController::class, 'deleteAtsiliepima']);

Route::get('/not', function () {
    return new Notification();
});

Route::get('/isimintiVartotojaPrideti',[App\Http\Controllers\IsimintiController::class, 'isimintiVartotojaPrideti']);
Route::get('/isimintiPaslauga/{id}', [App\Http\Controllers\IsimintiController::class, 'isimintiPaslauga']);
Route::get('/deleteIsimintaPaslauga/{id}', [App\Http\Controllers\IsimintiController::class, 'deleteIsimintaPaslauga']);
Route::get('/pamirstiPaslauga/{id}', [App\Http\Controllers\IsimintiController::class, 'pamirstiPaslauga']);

Route::get('/uzsakymai', [App\Http\Controllers\UzsakymaiController::class, 'index'])->name('uzsakymai');
Route::post('keistiProgresa',[App\Http\Controllers\UzsakymaiController::class, 'keistiProgresa']);
Route::post('sukurtiUzsakyma',[App\Http\Controllers\UzsakymaiController::class, 'sukurtiUzsakyma']);

Route::get('/deleteUzsakyma/{id}', [App\Http\Controllers\UzsakymaiController::class, 'deleteUzsakyma']);

Route::get('/valdymas', [App\Http\Controllers\ValdymasController::class, 'index'])->name('valdymas');
Route::get('kurtiKlausimus',[App\Http\Controllers\KlausimaiController::class, 'index']);

Route::post('kurtiKlausima',[App\Http\Controllers\KlausimaiController::class, 'sukurtiKlausimus']);

Route::get('/klausimaiEdit/{id}',[App\Http\Controllers\KlausimaiController::class, 'showData']);
Route::get('/uzklausaEdit/{id}',[App\Http\Controllers\KurtiController::class, 'showData']);

Route::post('/updateUzklausa',[App\Http\Controllers\KurtiController::class, 'updateUzklausa']);
Route::post('/updateKlausimus',[App\Http\Controllers\KlausimaiController::class, 'updateKlausimus']);

Route::get('/deleteKlausima/{id}', [App\Http\Controllers\KlausimaiController::class, 'deleteKlausima']);
Route::get('/deleteUzklausa/{id}', [App\Http\Controllers\KurtiController::class, 'deleteUzklausa']);


Route::post('sveciasKambario','App\Http\Controllers\VaizdoController@sveciasKambario');
