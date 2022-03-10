<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Skelbimas;

class PaslaugosController extends Controller
{
    public function index()
    {
    $skelbimai = Skelbimas::with('kategorijos')->with('users')->get();
    return view('paslaugos', ['skelbimai'=>$skelbimai]);
    }

    public function indexKurti()
    {
    return view('kurtiPaslauga');
    }

}
