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

Route::get('/uzklausa', [App\Http\Controllers\UzklausaController::class, 'index'])->name('uzklausa');

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
Route::get('/prenumeratos', [App\Http\Controllers\PrenumeratosController::class, 'index'])->name('prenumeratos');
Route::get('/manoKambarys', [App\Http\Controllers\VaizdoController::class, 'index'])->name('manoKambarys');

Route::get('/kurti', [App\Http\Controllers\KurtiController::class, 'index'])->name('kurti');
Route::post('kurtiUzklausa',[App\Http\Controllers\KurtiController::class, 'insertUzklausa']);
Route::post('kurtiPaslauga',[App\Http\Controllers\KurtiController::class, 'insertPaslauga']);

Route::get('/paslauga', [App\Http\Controllers\PaslaugosController::class, 'index'])->name('paslauga');

Route::get('/suma', function () {
    return view('pasirinktiSuma');
})->name('suma');

Route::get('mokejimas','App\Http\Controllers\MokejimasController@mokejimas')->name('mokejimas');
Route::post('mokejimas','App\Http\Controllers\MokejimasController@poMokejimo');
Route::post('mokejimasRed','App\Http\Controllers\MokejimasController@mokejimasRed');

Route::post('pervedimas','App\Http\Controllers\MokejimasController@pervedimas');
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
Route::post('/updatePaslauga',[App\Http\Controllers\PaslaugosController::class, 'updatePaslauga']);
Route::post('/updateKlausimus',[App\Http\Controllers\KlausimaiController::class, 'updateKlausimus']);
Route::post('/updateKonkursa',[App\Http\Controllers\KonkursasController::class, 'updateKonkursa']);

Route::get('/deleteKlausima/{id}', [App\Http\Controllers\KlausimaiController::class, 'deleteKlausima']);
Route::get('/deleteUzklausa/{id}', [App\Http\Controllers\KurtiController::class, 'deleteUzklausa']);
Route::get('/deleteKonkursa/{id}', [App\Http\Controllers\KonkursasController::class, 'deleteKonkursa']);

Route::post('sveciasKambario','App\Http\Controllers\VaizdoController@sveciasKambario');
Route::get('/paslauga/{id}', [App\Http\Controllers\SkelbimaiController::class, 'skelbimas']);

Route::post('submitKomentara',[App\Http\Controllers\KomentarasController::class, 'insertKomentara']);
Route::get('/deleteKomentara/{id}', [App\Http\Controllers\KomentarasController::class, 'deleteKomentara']);
Route::post('patvirtintiUzsakyma',[App\Http\Controllers\UzsakymaiController::class, 'patvirtintiUzsakyma']);
Route::get('/konkursai', [App\Http\Controllers\KonkursasController::class, 'index'])->name('konkursai');
Route::post('konkursoPasiulymas',[App\Http\Controllers\KonkursasController::class, 'konkursoSiulymas']);
Route::get('konkursoKurimas',[App\Http\Controllers\KonkursasController::class, 'konkursoKurimas']);
Route::post('sukurtiKonkursa',[App\Http\Controllers\KonkursasController::class, 'sukurtiKonkursa']);
Route::get('/konkursasEdit/{id}',[App\Http\Controllers\KonkursasController::class, 'showData']);
Route::get('/pasiulymas/{id}', [App\Http\Controllers\KonkursasController::class, 'rodytiPasiulymus']);

Route::get('/keistiSlaptazodi', [App\Http\Controllers\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
Route::post('/keistiSlaptazodi', [App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');

Route::post('prenumeruoti',[App\Http\Controllers\PrenumeratosController::class, 'kurtiPrenumerata']);

Route::get('/deletePrenumerata/{id}', [App\Http\Controllers\PrenumeratosController::class, 'deletePrenumerata']);
Route::get('/deletePaslauga/{id}', [App\Http\Controllers\PaslaugosController::class, 'deletePaslauga']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/testPaslauga', [App\Http\Controllers\KurtiController::class, 'testPaslauga']);

Route::get('/upload', [App\Http\Controllers\ImageUploadController::class, 'index']);
Route::post('/upload/store', [App\Http\Controllers\ImageUploadController::class, 'store']);
Route::get('/delete', [App\Http\Controllers\ImageUploadController::class, 'destroy']);

Route::get('/deleteUzklausosNuotrauka/{id}', [App\Http\Controllers\UzklausaController::class, 'deleteUzklausosNuotrauka']);
Route::get('/paslaugaEdit/{id}',[App\Http\Controllers\PaslaugosController::class, 'showData']);

Route::get('/adminValdymas', [App\Http\Controllers\ValdymasController::class, 'adminValdymas']);
Route::get('/adminPatvirtinimas', [App\Http\Controllers\ValdymasController::class, 'AdminPatvirtinimas']);

Route::get('/paslaugaPatvirtinti/{id}', [App\Http\Controllers\PaslaugosController::class, 'paslaugaPatvirtinti']);
Route::get('/paslaugaAtsaukti/{id}', [App\Http\Controllers\PaslaugosController::class, 'paslaugaAtsaukti']);

Route::get('/uzklausaPatvirtinti/{id}', [App\Http\Controllers\KurtiController::class, 'uzklausaPatvirtinti']);
Route::get('/uzklausaAtsaukti/{id}', [App\Http\Controllers\KurtiController::class, 'uzklausaAtsaukti']);

Route::get('/konkursasPatvirtinti/{id}', [App\Http\Controllers\KonkursasController::class, 'konkursasPatvirtinti']);
Route::get('/konkursasAtsaukti/{id}', [App\Http\Controllers\KonkursasController::class, 'konkursasAtsaukti']);

Route::get('/ieskoti', [App\Http\Controllers\PaslaugosController::class, 'ieskoti']);
Route::get('/ieskotiUzklausu', [App\Http\Controllers\KurtiController::class, 'ieskotiUzklausu']);
Route::post('ivertintiPaslauga',[App\Http\Controllers\PaslaugosController::class, 'ivertintiPaslauga']);