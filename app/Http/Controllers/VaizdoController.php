<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vartotojas;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
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
            if($vartotojas->kambarioUzraktas == 1){
                return Redirect::Back()->with('alert', 'Kambarys užrakintas!');
            }
            else{
            return view('svecioPokalbiuKambarys',['id'=>$data]);
            }
        }
        else
        {
            return Redirect::Back()->with('alert', 'Slaptažodis neatitinka!');
        }
    }
    function keistiKambarioSlaptazodi(Request $request)
    {
        $vartotojas = Vartotojas::find(Auth::user()->id);
        $vartotojas->kambarioSlaptazodis = $request->naujasKambarioSlaptazodis;
        $vartotojas->save();
        return Redirect::back()->with('message', 'Kambario slaptažodis pakeistas!');
    }
    function atrakintiKambari()
    {
        $vartotojas = Vartotojas::find(Auth::user()->id);
        $vartotojas->kambarioUzraktas = 0;
        $vartotojas->save();
        return Redirect::back()->with('message', 'Kambarys atrakintas!');
    }
    function uzrakintiKambari()
    {
        $vartotojas = Vartotojas::find(Auth::user()->id);
        $vartotojas->kambarioUzraktas = 1;
        $vartotojas->save();
        return Redirect::back()->with('message', 'Kambarys užrakintas!');
    }
}
