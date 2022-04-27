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
        return view('valdymas', ['uzklausos'=>$uzklausos, 'paslaugos'=>$paslaugos,'klausimai'=>$klausimai,'konkursai'=>$konkursai,'uzsakymai'=>$uzsakymai,'progresai'=>$progresai,'vartotojai'=>$vartotojai]);
    }
}
