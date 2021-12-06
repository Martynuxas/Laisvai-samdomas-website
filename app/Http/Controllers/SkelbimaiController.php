<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skelbimas;
use App\Models\Kategorija;

class SkelbimaiController extends Controller
{
    public function index()
    {
    $skelbimai = Skelbimas::with('kategorijos')->with('statusai')->get();
    return view('skelbimai', ['skelbimai'=>$skelbimai]);
    }
}
