<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;

class KategorijosController extends Controller
{
    public function index()
    {
        $kategorijos = Kategorija::all();

        return view('kategorijos', ['kategorijos'=>$kategorijos]);
    }
}
