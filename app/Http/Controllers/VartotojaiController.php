<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vartotojas;

class VartotojaiController extends Controller
{
    public function index()
    {
    $vartotojai = Vartotojas::simplePaginate(3);

    return view('vartotojai', ['vartotojai'=>$vartotojai]);
    }
}
