<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vartotojas;
class VaizdoController extends Controller
{
    //
    function index()
    {
        return view('manoKambarys');
    }
    function SveciasKambario(Request $request)
    {
        $data = $request->kambarioid;
        return view('svecias',['id'=>$data]);
    }
}
