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

    public function keistiProgresa(Request $request)
    {
        $progresas = Progresas::find($request->progresas);
        if($progresas->pavadinimas == 'Baigta')
        {
            $uzsakovas = Vartotojas::find(Auth::user()->id);
            $uzsakovas->uzsakymuKiekis = $uzsakovas->uzsakymuKiekis + 1;
            if($uzsakovas->uzsakymuKiekis == 11){$uzsakovas->lygis = 4;}
            if($uzsakovas->uzsakymuKiekis == 41){$uzsakovas->lygis = 5;}
            if($uzsakovas->uzsakymuKiekis == 77){$uzsakovas->lygis = 6;}
            if($uzsakovas->uzsakymuKiekis == 101){$uzsakovas->lygis = 3;}
            $uzsakovas->save();
        }
        $data = Uzsakymas::find($request->idas);
        $data->progresas=$request->progresas;
        $data->data=date('Y-m-d H:i:s');
        $data->save();
        return Redirect::back()->with('message', 'Progresas pakeistas!');
    }
    public function sukurtiUzsakyma(Request $request)
    {
        if($request->vartotojoid == Auth::user()->id)
        {
            return Redirect::back()->with('alert', 'Negalite sau užsakymo suteikti!');
        }
        else{
        $uzsakymas = new Uzsakymas();
        $uzsakymas->progresas=1;
        $uzsakymas->uzsakovo_id=$request->vartotojoid;
        $uzsakymas->tema=$request->tema;
        $uzsakymas->specialisto_id=Auth::user()->id;
        $uzsakymas->data=date('Y-m-d H:i:s');
        $uzsakymas->save();
        return Redirect::back()->with('message', 'Užsakymas sukurtas!');
        }
    }
    public function patvirtintiUzsakyma(Request $request)
    {
        $uzsakymas = Uzsakymas::find($request->uzsakymoid);
        $uzsakymas->progresas=2;
        $uzsakymas->data=date('Y-m-d H:i:s');
        $uzsakymas->save();
        return Redirect::back()->with('message', 'Užsakymas patvirtintas!');
    }
    public function deleteUzsakyma($id)
    {
        $uzsakymasdel = Uzsakymas::find($id);
        $uzsakymasdel->delete();
        return Redirect::back()->with('message', 'Užsakymas pašalintas!');
    }
}