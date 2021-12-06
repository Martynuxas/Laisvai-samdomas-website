<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Isiminti;
use App\Models\Vartotojai;

class IsimintiController extends Controller
{
    public function index()
    {
        $isiminti = Isiminti::all();

        return view('isiminti', ['isiminti'=>$isiminti]);
    }
}
