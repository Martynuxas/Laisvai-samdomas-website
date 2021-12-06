<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prenumerata;

class PrenumeratosController extends Controller
{
    public function index()
    {
    $prenumeratos = Prenumerata::with('kategorijos')->get();

    return view('prenumerata', ['prenumeratos'=>$prenumeratos]);
    }
}
