<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Uzklausa;
use App\Models\Skelbimas;
use Auth;
use App\Models\Klausimas;
use App\Models\Konkursas;
use App\Models\Uzsakymas;
use App\Models\Progresas;
use App\Models\Vartotojas;
class ValdymasController extends Controller
{
    //
    function index()
    {
        $uzklausos = Uzklausa::where('vartotojo_id', '=', Auth::user()->id)
        ->orderBy('data', 'desc')
        ->paginate(5);
        $paslaugos = Skelbimas::where('vartotojo_id', '=', Auth::user()->id)
        ->orderBy('data', 'desc')
        ->paginate(5);
        $klausimai = Klausimas::where('vartotojo_id', '=', Auth::user()->id)
        ->orderBy('atnaujintas', 'desc')
        ->paginate(5);
        $konkursai = Konkursas::where('vartotojo_id', '=', Auth::user()->id)
        ->orderBy('atnaujintas', 'desc')
        ->paginate(5);
        $uzsakymai = Uzsakymas::where('specialisto_id', '=', Auth::user()->id)
        ->orwhere('uzsakovo_id', '=', Auth::user()->id)
        ->orderBy('data', 'desc')
        ->paginate(5);
        $progresai = Progresas::all();
        $vartotojai = Vartotojas::all();
        return view('irasuValdymas', ['uzklausos'=>$uzklausos, 'paslaugos'=>$paslaugos,'klausimai'=>$klausimai,'konkursai'=>$konkursai,'uzsakymai'=>$uzsakymai,'progresai'=>$progresai,'vartotojai'=>$vartotojai]);
    }
    function adminValdymas()
    {
        $uzklausos = Uzklausa::orderBy('data', 'desc')
        ->paginate(5);
        $paslaugos = Skelbimas::orderBy('data', 'desc')
        ->paginate(5);
        $konkursai = Konkursas::orderBy('atnaujintas', 'desc')
        ->paginate(5);
        $vartotojai = Vartotojas::all();
        return view('administratoriausIrasuValdymas', ['uzklausos'=>$uzklausos, 'paslaugos'=>$paslaugos,'konkursai'=>$konkursai,'vartotojai'=>$vartotojai]);
    }
    function adminPatvirtinimas()
    {
        $uzklausos = Uzklausa::where('busena', '=', 'Laukiama patvirtinimo')
        ->orderBy('data', 'desc')
        ->paginate(5);
        $paslaugos = Skelbimas::where('busena', '=', 'Laukiama patvirtinimo')
        ->orderBy('data', 'desc')
        ->paginate(5);
        $konkursai = Konkursas::where('busena', '=', 'Laukiama patvirtinimo')
        ->orderBy('atnaujintas', 'desc')
        ->paginate(5);
        $progresai = Progresas::all();
        $vartotojai = Vartotojas::all();
        return view('administratoriausIrasuPatvirtinimas', ['uzklausos'=>$uzklausos, 'paslaugos'=>$paslaugos,'konkursai'=>$konkursai,'progresai'=>$progresai,'vartotojai'=>$vartotojai]);
    }
}
