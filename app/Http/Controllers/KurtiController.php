<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Kategorija;
use App\Models\Uzklausa;
use App\Models\Nuotrauka;
use Auth;
use App\Models\Prenumerata;
use App\Models\Skelbimas;
use App\Models\Planas;
use App\Models\ImageUpload;

class KurtiController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorijos = Kategorija::All();
        return view('kurti', ['kategorijos'=>$kategorijos]);
    }
    public function indexPaslauga()
    {
        $kategorijos = Kategorija::All();
        return view('kurtiPaslauga', ['kategorijos'=>$kategorijos]);
    }
    public function showData($id)
    {
        $kategorijos = Kategorija::All();
        $data = Uzklausa::find($id);
        return view('redaguotiUzklausa',['data'=>$data,'kategorijos'=>$kategorijos]);
    }
    public function deleteUzklausa($id)
    {
        $data=Uzklausa::find($id);
        $data->delete();
        return Redirect::to('/valdymas ')->with('success', 'Užklausa pašalinta');
    }

    public function insertUzklausa(Request $request)
    {
        $validator = Validator::make(
        ['laikas' => $request->input('laikas'),
        'biudzetas' => $request->input('biudzetas'),
        'filename' => 'required',
        'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'kategorija' => $request->input('kategorija'),
        'aprasymas' => $request->input('aprasymas'),
        'pavadinimas' => $request->input('pavadinimas')
        ],
        ['laikas' => 'required',
        'biudzetas' => 'required|numeric',
        'kategorija' => 'required|alpha_num',
        'aprasymas' => 'required|max:255',
        'pavadinimas' => 'required|max:100'
        ]
        );
    if ($validator->fails())
    {
        //return Redirect::back()->withErrors($validator);
    }
    else
    {
        $uzklausa = new Uzklausa();
        $uzklausa->vartotojo_id = Auth::user()->id;
        $uzklausa->laikas = $request->input('laikas');
        $uzklausa->biudzetas = $request->input('biudzetas');
        $uzklausa->kategorija = $request->input('kategorija');
        $uzklausa->aprasymas = $request->input('aprasymas');
        $uzklausa->data = date('Y-m-d H:i:s');
        $uzklausa->atnaujintas = date('Y-m-d H:i:s');
        $uzklausa->pavadinimas = $request->input('pavadinimas');
        $uzklausa->save();
        if($request->hasfile('filename'))
        {
           foreach($request->file('filename') as $image)
           {
               $nuotrauka = new Nuotrauka();
               $name=$image->getClientOriginalName();
               $name="((".Auth::user()->id."))".$name;
               $nuotrauka->nuoroda = $name;
               $nuotrauka->tipas = "uzklausa";
               $nuotrauka->skelbimoid = $uzklausa->id;
               $nuotrauka->data = date('Y-m-d H:i:s');
               $nuotrauka->save();
               $image->move(public_path().'/images/', $name);  
           }
        }
    }
    //$this->siustiPrenumeratoriams($request->input('kategorija'), $request->input('pavadinimas'));
    //return Redirect::to('/kurti')->with('success', 'Užklausa patvirtinta');
    }
    public function gautiNuotraukas($skelbimas, $tipas){
        $nuotraukos = Nuotrauka::where('tipas','=', $tipas)->where('skelbimoid','=', $skelbimas)->get();
     return $nuotraukos;
    }
    public function siustiPrenumeratoriams($kategorijosId, $pavadinimas)
    {
        $prenumeratos = Prenumerata::where('kategorijos_id','=', $kategorijosId)->get();

        foreach($prenumeratos as $prenumerata){
            $kategorija = $prenumerata->kategorijos->pavadinimas;
            PranesimaiController::addMessage($prenumerata->vartotojo_id, "Patalpinta jūsų prenumeruota kategorija($kategorija): Užklausa($pavadinimas)"); 
        }
    }
    public function updateUzklausa(Request $request)
    {
        $validator = Validator::make(
        ['laikas' => $request->input('laikas'),
        'biudzetas' => $request->input('biudzetas'),
        'kategorija' => $request->input('kategorija'),
        'aprasymas' => $request->input('aprasymas'),
        'pavadinimas' => $request->input('pavadinimas')
        ],
        ['laikas' => 'required',
        'biudzetas' => 'required|numeric',
        'kategorija' => 'required|alpha_num',
        'aprasymas' => 'required|max:255',
        'pavadinimas' => 'required|max:100'
        ]
        );
    if ($validator->fails())
    {
        return Redirect::back()->withErrors($validator);
    }
    else
    {
        $uzklausa = Uzklausa::find($request->input('id'));
        $uzklausa->vartotojo_id = Auth::user()->id;
        $uzklausa->laikas = $request->input('laikas');
        $uzklausa->biudzetas = $request->input('biudzetas');
        $uzklausa->kategorija = $request->input('kategorija');
        $uzklausa->aprasymas = $request->input('aprasymas');
        $uzklausa->atnaujintas = date('Y-m-d H:i:s');
        $uzklausa->pavadinimas = $request->input('pavadinimas');
        $uzklausa->save();
        if($request->hasfile('filename'))
        {
           foreach($request->file('filename') as $image)
           {
               $nuotrauka = new Nuotrauka();
               $name=$image->getClientOriginalName();
               $name="((".Auth::user()->id."))".$name;
               $nuotrauka->nuoroda = $name;
               $nuotrauka->tipas = "uzklausa";
               $nuotrauka->skelbimoid = $uzklausa->id;
               $nuotrauka->data = date('Y-m-d H:i:s');
               $nuotrauka->save();
               $image->move(public_path().'/images/', $name);  
           }
        }
    }
    return Redirect::to('/valdymas')->with('success', 'Užklausa atnaujinta');
    }
    public function insertPaslauga(Request $request)
    {
        $validator = Validator::make(
        ['pavadinimas' => $request->input('pavadinimas'),
        'aprasymas' => $request->input('editor'),
        'valandinis' => $request->input('valandinis'),
        'patirtis' => $request->input('patirtis'),
        'kategorija' => $request->input('kategorija'),
        'paslaugos_atstumas' => $request->input('paslaugos_atstumas'),
        'asmens_tipas' => $request->input('asmens_tipas'),
        'miestas' => $request->input('miestas')
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
        $skelbimas = new Skelbimas();
        $skelbimas->pavadinimas = $request->input('pavadinimas');
        $skelbimas->aprasymas = $request->input('editor');
        $skelbimas->valandinis = $request->input('valandinis');
        $skelbimas->data = date('Y-m-d H:i:s');
        $skelbimas->telefonas = Auth::user()->numeris;
        $skelbimas->el_pastas = Auth::user()->email;
        $skelbimas->patirtis = $request->input('patirtis');
        $skelbimas->kategorijos_id = $request->input('kategorija');
        $skelbimas->paslaugu_atstumai = $request->input('paslaugos_atstumas');
        $skelbimas->statuso_id = 2;
        $skelbimas->asmens_tipas = $request->input('asmens_tipas');
        $skelbimas->miestas = $request->input('miestas');
        $skelbimas->vartotojo_id = Auth::user()->id;
        $skelbimas->save();
        print_r($request->file('filename'));
        print_r($request->file('filenameVirselis'));
        if($request->hasfile('filename') || $request->hasfile('filenameVirselis'))
        {
            if($request->hasfile('filename'))
            {
                foreach($request->file('filename') as $image)
                {
                    $nuotrauka = new Nuotrauka();
                    $name=$image->getClientOriginalName();
                    $name="(((".Auth::user()->id.")))".$name;
                    $nuotrauka->nuoroda = $name;
                    $nuotrauka->tipas = "skelbimas";
                    $nuotrauka->skelbimoid = $skelbimas->id;
                    $nuotrauka->data = date('Y-m-d H:i:s');
                    $nuotrauka->save();
                    $image->move(public_path().'/images/', $name);  
                }
            }
            if($request->hasfile('filenameVirselis'))
            {
                foreach($request->file('filenameVirselis') as $image)
                {
                    $nuotrauka = new Nuotrauka();
                    $name=$image->getClientOriginalName();
                    $name="((((".Auth::user()->id."))))".$name;
                    $nuotrauka->nuoroda = $name;
                    $nuotrauka->tipas = "skelbimasVirselis";
                    $nuotrauka->skelbimoid = $skelbimas->id;
                    $nuotrauka->data = date('Y-m-d H:i:s');
                    $nuotrauka->save();
                    $image->move(public_path().'/images/', $name);  
                }
            }
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
    }
    return Redirect::back()->with('success', 'Paslauga patvirtinta');
    }

}
