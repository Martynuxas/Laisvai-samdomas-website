<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uzsakymas;
use Illuminate\Support\Facades\Auth;
use App\Models\Progresas;
use Illuminate\Support\Facades\Redirect;
use App\Models\Vartotojas;

class UzsakymaiController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uzsakymai = Uzsakymas::where('specialisto_id', '=', Auth::user()->id)
        ->orwhere('uzsakovo_id', '=', Auth::user()->id)
        ->orderBy('data', 'desc')
        ->paginate(5);
        $progresai = Progresas::all();
        $vartotojai = Vartotojas::all();
        return view('uzsakymai', ['uzsakymai'=>$uzsakymai, 'progresai'=>$progresai, 'vartotojai'=>$vartotojai]);
    }
    public function keistiProgresa(Request $request)
    {
        $data = Uzsakymas::find($request->id);
        $data->progresas=$request->progresas;
        $data->data=date('Y-m-d H:i:s');
        $data->save();
        return Redirect::back()->with('success', 'Progresas pakeistas!');
    }
    public function sukurtiUzsakyma(Request $request)
    {
        $uzsakymas = new Uzsakymas();
        $uzsakymas->progresas=2;
        $uzsakymas->uzsakovo_id=$request->vartotojoid;
        $uzsakymas->specialisto_id=Auth::user()->id;
        $uzsakymas->data=date('Y-m-d H:i:s');
        $uzsakymas->save();
        return Redirect::back()->with('success', 'Užsakymas sukurtas!');
    }
    public function deleteUzsakyma($id)
    {
        $uzsakymasdel = Uzsakymas::find($id);
        $uzsakymasdel->delete();
        return Redirect::back()->with('success', 'Užsakymas pašalintas!');
    }
}