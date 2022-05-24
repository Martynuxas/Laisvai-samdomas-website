<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Skelbimas;
use App\Models\Komentaras;
use App\Models\Kategorija;
use Auth;
use App\Models\Nuotrauka;
use App\Models\Planas;
use App\Models\Klausimas;
use App\Models\IsimintaPaslauga;
use App\Models\Ivertinimas;
use App\Models\Uzsakymas;

class PaslaugosController extends Controller
{
    public function index()
    {
    $skelbimai = Skelbimas::with('kategorijos')->with('users')->orderBy('data','DESC')
    ->where('busena', '=', 'patvirtinta')->paginate(20);
    return view('paslauguSarasas', ['skelbimai'=>$skelbimai]);
    }
    public function arJauIvertintas($id){
        $ivertinimas = Ivertinimas::where('skelbimoId','=',$id)->get();
        if(count($ivertinimas) ==0){
            return false;
        }
        return true;
    }
    public function ieskoti(Request $request)
    {
        $search_text = $request->get('query');
        $skelbimai = Skelbimas::where('pavadinimas','LIKE','%'.$search_text.'%')->with('kategorijos')->with('users')->orderBy('data','DESC')
        ->where('busena', '=', 'patvirtinta')->paginate(20);
        return view('paslauguSarasas', ['skelbimai'=>$skelbimai]);
    }
    public function ivertintiPaslauga(Request $request){
        if($request->rating1 != 0  || $request->rating2 != 0 || $request->rating3 != 0 || $request->rating4 != 0 || $request->rating5 != 0)
        {
            $ivertinimas = new Ivertinimas();
            $ivertinimas->skelbimoId = $request->paslaugosId;
            $ivertinimas->vartotojoId = Auth::user()->id;
            $ivertinimas->Ivertinimas_1 = $request->rating1;
            $ivertinimas->Ivertinimas_2 = $request->rating2;
            $ivertinimas->Ivertinimas_3 = $request->rating3;
            $ivertinimas->Ivertinimas_4 = $request->rating4;
            $ivertinimas->Ivertinimas_5 = $request->rating5;
            $vidurkis = ($request->rating1+$request->rating2+$request->rating3+$request->rating4+$request->rating5)/5;
            $ivertinimas->Vidurkis = $vidurkis;
            $ivertinimas->save();
            return Redirect::back()->with('message', 'Paslauga įvertinta');
        }
        return Redirect::back()->with('alert', 'Turite atsakyti į visus klausimus!');
    }
    public function showData($id)
    {
        $kategorijos = Kategorija::All();
        $planai = Planas::where('skelbimo_id','=',$id)->get();
        $data = Skelbimas::find($id);
        $duksas = Klausimas::where('vartotojo_id', '=', $data->vartotojo_id)->get();
        return view('paslaugosRedagavimas', ['data'=>$data,'kategorijos'=>$kategorijos,'planai'=>$planai,'duksas'=>$duksas]);
    }
    public function KomentaruSkaicius($skelbimoid){
        $komentarai = Komentaras::where('paslaugos_id','=',$skelbimoid)->get();
        return count($komentarai);
    }
    public function isiminimuSkaicius($skelbimoid){
        $isiminimai = IsimintaPaslauga::where('isimintosPaslaugosId','=',$skelbimoid)->get();
        return count($isiminimai);
    }
    public function deletePaslauga($id)
    {
        $data=Skelbimas::find($id);
        $data->delete();
        return Redirect::back()->with('message', 'Paslauga pašalinta');
    }
    public function paslaugaPatvirtinti($id){
        $paslauga = Skelbimas::find($id);
        $paslauga->busena = "patvirtinta";
        $paslauga->save();
        return Redirect::back()->with('message', 'Paslauga patvirtinta!');
    }
    public function paslaugaAtsaukti($id){
        $paslauga = Skelbimas::find($id);
        $paslauga->busena = "atšaukta";
        $paslauga->save();
        return Redirect::back()->with('message', 'Paslauga atšaukta!');
    }
    public function updatePaslauga(Request $request)
    {
        $validator = Validator::make(
        ['pavadinimas' => $request->input('pavadinimas'),
        'aprasymas' => $request->input('editor'),
        'valandinis' => $request->input('valandinis'),
        'patirtis' => $request->input('patirtis'),
        'kategorija' => $request->input('kategorija'),
        'paslaugos_atstumas' => $request->input('paslaugos_atstumas'),
        'asmens_tipas' => $request->input('asmens_tipas'),
        'miestas' => $request->input('miestas'),
        ],
        ['pavadinimas' => 'required',
        'aprasymas' => 'required',
        'valandinis' => 'required|numeric',
        'patirtis' => 'required|numeric',
        'kategorija' => 'required',
        'paslaugos_atstumas' => 'required',
        'asmens_tipas' => 'required',
        'miestas' => 'required'
        ]
        );
    if ($validator->fails())
    {
        return Redirect::back()->withErrors($validator);
    }
    else
    {
        $skelbimas = Skelbimas::find($request->input('id'));
        $skelbimas->pavadinimas = $request->input('pavadinimas');
        $skelbimas->aprasymas = $request->input('editor');
        $skelbimas->valandinis = $request->input('valandinis');
        $skelbimas->data = date('Y-m-d H:i:s');
        $skelbimas->patirtis = $request->input('patirtis');
        $skelbimas->kategorijos_id = $request->input('kategorija');
        $skelbimas->paslaugu_atstumai = $request->input('paslaugos_atstumas');
        $skelbimas->statuso_id = 2;
        $skelbimas->asmens_tipas = $request->input('asmens_tipas');
        $skelbimas->miestas = $request->input('miestas');
        $skelbimas->klausimynoId = $request->input('klausimynoId');
        $skelbimas->save();
        if($request->hasfile('filename'))
        {
            if($request->hasfile('filename'))
            {
                foreach($request->file('filename') as $image)
                {
                    $nuotrauka = new Nuotrauka();
                    $name=$image->getClientOriginalName();
                    $name="(((".$skelbimas->vartotojo_id.")))".$name;
                    $nuotrauka->nuoroda = $name;
                    $nuotrauka->tipas = "skelbimas";
                    $nuotrauka->skelbimoid = $skelbimas->id;
                    $nuotrauka->data = date('Y-m-d H:i:s');
                    $nuotrauka->save();
                    $image->move(public_path().'/images/', $name);  
                }
            }
        }
        if($request->input('pavadinimas1') != ''){
            $planas1 = new Planas();
            $planas1->pavadinimas = $request->input('pavadinimas1');
            $planas1->kainos_tipas = $request->input('kainos_tipas1');
            $planas1->skelbimo_id = $skelbimas->id;
            $planas1->tekstas_1 = $request->input('tekstas1_1');
            $planas1->tekstas_2 = $request->input('tekstas1_2');
            $planas1->tekstas_3 = $request->input('tekstas1_3');
            $planas1->tekstas_4 = $request->input('tekstas1_4');
            $planas1->tekstas_5 = $request->input('tekstas1_5');
            $planas1->kaina = $request->input('kaina1');
            $planas1->save();
        }
        if($request->input('pavadinimas2') != ''){
            $planas2 = new Planas();
            $planas2->pavadinimas = $request->input('pavadinimas2');
            $planas2->kainos_tipas = $request->input('kainos_tipas2');
            $planas2->skelbimo_id = $skelbimas->id;
            $planas2->tekstas_1 = $request->input('tekstas2_1');
            $planas2->tekstas_2 = $request->input('tekstas2_2');
            $planas2->tekstas_3 = $request->input('tekstas2_3');
            $planas2->tekstas_4 = $request->input('tekstas2_4');
            $planas2->tekstas_5 = $request->input('tekstas2_5');
            $planas2->kaina = $request->input('kaina2');
            $planas2->save();
        }
        if($request->input('pavadinimas3') != ''){
            $planas3 = new Planas();
            $planas3->pavadinimas = $request->input('pavadinimas3');
            $planas3->kainos_tipas = $request->input('kainos_tipas3');
            $planas3->skelbimo_id = $skelbimas->id;
            $planas3->tekstas_1 = $request->input('tekstas3_1');
            $planas3->tekstas_2 = $request->input('tekstas3_2');
            $planas3->tekstas_3 = $request->input('tekstas3_3');
            $planas3->tekstas_4 = $request->input('tekstas3_4');
            $planas3->tekstas_5 = $request->input('tekstas3_5');
            $planas3->kaina = $request->input('kaina3');
            $planas3->save();
        }
    }
    return Redirect::back()->with('message', 'Paslauga atnaujinta');
    }
}
