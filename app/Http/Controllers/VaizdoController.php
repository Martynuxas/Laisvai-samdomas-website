<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vartotojas;
use Redirect;
class VaizdoController extends Controller
{
    //
    function index()
    {
        return view('nuosavasPokalbiuKambarys');
    }
    function SveciasKambario(Request $request)
    {
        $data = $request->kambarioid;
        $vartotojas = Vartotojas::find($data);
        $pass = $request->kambariopass;
        if($vartotojas->kambarioSlaptazodis == $pass)
        {
            return view('svecioPokalbiuKambarys',['id'=>$data]);
        }
        else
        {
            return Redirect::Back()->with('alert', 'Slaptažodis neatitinka!');
        }
    }
}
