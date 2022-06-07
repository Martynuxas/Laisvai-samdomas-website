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
        $data->patvirtinimas = 1;
        $data->buvesProgresas=$data->progresas;
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
        $užsakovas = Vartotojas::find($request->vartotojoid);
        if($užsakovas->valiuta < $request->suma)
        {
            return Redirect::back()->with('alert', 'Užsakovas tokios sumos neturi!');
        }
        $uzsakymas = new Uzsakymas();
        $uzsakymas->progresas=1;
        $uzsakymas->patvirtinimas=0;
        $uzsakymas->uzsakovo_id=$request->vartotojoid;
        $uzsakymas->suma=$request->suma;
        $uzsakymas->depozitas=$request->suma;
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
        $vartotojas = Vartotojas::find(Auth::user()->id);
        $vartotojas->valiuta -= $uzsakymas->suma;
        $vartotojas->save();
        $uzsakymas->progresas=2;
        $uzsakymas->patvirtinimas=0;
        $uzsakymas->data=date('Y-m-d H:i:s');
        $uzsakymas->save();
        return Redirect::back()->with('message', 'Užsakymas patvirtintas!');
    }
    public function patvirtintiProgresa(Request $request)
    {
        $uzsakymas = Uzsakymas::find($request->uzsakymoid);
        $uzsakovas = Vartotojas::find($uzsakymas->uzsakovo_id);
        $specialistas = Vartotojas::find($uzsakymas->specialisto_id);
        $uzsakymas->patvirtinimas=0;
        $kiekis = 0;
        $buvusioKiekis = 0;
        $uzsakymas->data=date('Y-m-d H:i:s');
        if($uzsakymas->progresas == 3){$kiekis = 10;}
        if($uzsakymas->progresas == 4){$kiekis = 20;}
        if($uzsakymas->progresas == 5){$kiekis = 30;}
        if($uzsakymas->progresas == 6){$kiekis = 40;}
        if($uzsakymas->progresas == 7){$kiekis = 50;}
        if($uzsakymas->progresas == 8){$kiekis = 60;}
        if($uzsakymas->progresas == 9){$kiekis =70;}
        if($uzsakymas->progresas == 10){$kiekis = 80;}
        if($uzsakymas->progresas == 11){$kiekis = 90;}
        if($uzsakymas->progresas == 12){$kiekis = 100;}
        if($uzsakymas->buvesProgresas == 3){$buvusioKiekis = 10;}
        if($uzsakymas->buvesProgresas == 4){$buvusioKiekis = 20;}
        if($uzsakymas->buvesProgresas == 5){$buvusioKiekis = 30;}
        if($uzsakymas->buvesProgresas == 6){$buvusioKiekis = 40;}
        if($uzsakymas->buvesProgresas == 7){$buvusioKiekis = 50;}
        if($uzsakymas->buvesProgresas == 8){$buvusioKiekis = 60;}
        if($uzsakymas->buvesProgresas == 9){$buvusioKiekis = 70;}
        if($uzsakymas->buvesProgresas == 10){$buvusioKiekis = 80;}
        if($uzsakymas->buvesProgresas == 11){$buvusioKiekis = 90;}
        if($uzsakymas->buvesProgresas == 12){$buvusioKiekis = 100;}
        if($uzsakymas->progresas != 13){
        $kiekisProc = $kiekis - $buvusioKiekis;
        $specialistas->valiuta += $uzsakymas->suma * ($kiekisProc*0.01);
        $uzsakymas->depozitas -= $uzsakymas->suma * ($kiekisProc*0.01);
        }
        $specialistas->save();
        $uzsakovas->save();
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