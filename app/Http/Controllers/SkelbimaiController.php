<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Skelbimas;
use App\Models\Kategorija;
use App\Models\Vartotojas;
use App\Models\Statusas;
use App\Models\Komentaras;
use App\Models\Planas;
use App\Models\Nuotrauka;
use Symfony\Component\ErrorHandler\Debug;
use App\Models\Klausimas;

class SkelbimaiController extends Controller
{
    public function gautiSkelbimoPlanus($skelbimoid){
        $planai = Planas::where('skelbimo_id', '=', $skelbimoid)->get();
        return $planai;
    }
    public function skelbimas($id){
        $skelbimas = Skelbimas::find($id);
        $DUKS = Klausimas::find($skelbimas->klausimynoId);
        $komentarai = Komentaras::with('userKomentavo')
        ->where('paslaugos_id', '=', $id)
        ->orderBy('data', 'desc')
        ->paginate(10);
        return view('paslauga',['skelbimas'=> $skelbimas, 'komentarai'=>$komentarai, 'duks'=>$DUKS]);
    }
    function gautiVartotoja($vartotojoid){
        $vartotojas = Vartotojas::find($vartotojoid);
        return $vartotojas;
    }
    function gautiPirmaNuotrauka($skelbimoid){
        $nuotrauka = Nuotrauka::where('skelbimoid', '=', $skelbimoid)->where('tipas', '=', 'skelbimas')->orderBy('data', 'DESC')->first();
        if($nuotrauka != ''){
            return $nuotrauka->nuoroda;
        }
    }
}
