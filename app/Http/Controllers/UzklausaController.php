<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kategorija;
use App\Models\Uzklausa;
use App\Models\Nuotrauka;

class UzklausaController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uzklausos = Uzklausa::orderBy('data', 'DESC')
        ->where('busena', '=', 'patvirtinta')
        ->paginate(10);
        return view('uzklausa', ['uzklausos'=>$uzklausos]);
    }
    public function deleteUzklausosNuotrauka($id){
        $nuotrauka = Nuotrauka::find($id);
        $nuotrauka->delete();
    }
}
