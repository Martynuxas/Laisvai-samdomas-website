<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Uzklausa;
use App\Models\Skelbimas;
use Auth;
use App\Models\Klausimas;
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
        return view('valdymas', ['uzklausos'=>$uzklausos, 'paslaugos'=>$paslaugos,'klausimai'=>$klausimai]);
    }
}
