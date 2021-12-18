<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Skelbimas;
use App\Models\Kategorija;
use App\Models\Vartotojas;
use App\Models\Statusas;

class SkelbimaiController extends Controller
{
    public function index()
    {
    $skelbimai = Skelbimas::with('kategorijos')->with('statusai')->get();
    $vartotojai = Vartotojas::all();
    $kategorijos = Kategorija::all();
    $statusai = Statusas::all();
    return view('skelbimai', ['skelbimai'=>$skelbimai,'vartotojai'=>$vartotojai,'kategorijos'=>$kategorijos,'statusai'=>$statusai]);
    }
    public function insertSkelbimus(Request $request)
    {
        $validator = Validator::make(
        ['pavadinimas' => $request->input('pavadinimas'),
        'aprasymas' => $request->input('aprasymas'),
        'valandinis' => $request->input('valandinis'),
        'biudzetas' => $request->input('biudzetas'),
        'telefonas' => $request->input('telefonas'),
        'el_pastas' => $request->input('el_pastas'),
        'galerijos_nuoroda' => $request->input('galerijos_nuoroda'),
        'patirtis' => $request->input('patirtis'),
        'kategorijos_id' => $request->input('kategorijos_id'),
        'paslaugu_atstumai' => $request->input('paslaugu_atstumai'),
        'statuso_id' => $request->input('statuso_id'),
        'asmens_tipas' => $request->input('asmens_tipas'),
        'miestas' => $request->input('miestas'),
        'vartotojo_id' => $request->input('vartotojo_id')
        ],
        [ 'pavadinimas' => ['required', 'string', 'max:30'],
        'aprasymas' => ['required', 'string', 'max:800'],
        'valandinis' => 'required|alpha_num',
        'biudzetas' => 'required|alpha_num',
        'telefonas' => 'required|alpha_num',
        'el_pastas' => ['required', 'string', 'email', 'max:255'],
        'galerijos_nuoroda' => 'required|alpha_num',
        'patirtis' => 'required|alpha_num',
        'kategorijos_id' => 'required|alpha_num',
        'paslaugu_atstumai' => 'required|alpha_num',
        'statuso_id' => 'required|alpha_num',
        'asmens_tipas' => 'required|alpha_num',
        'miestas' => 'required|alpha_num',
        'vartotojo_id' => 'required|alpha_num'
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
        $skelbimas->aprasymas = $request->input('aprasymas');
        $skelbimas->valandinis = $request->input('valandinis');
        $skelbimas->biudzetas = $request->input('biudzetas');
        $skelbimas->data = date('Y-m-d H:i:s');
        $skelbimas->telefonas = $request->input('telefonas');
        $skelbimas->el_pastas = $request->input('el_pastas');
        $skelbimas->galerijos_nuoroda = $request->input('galerijos_nuoroda');
        $skelbimas->patirtis = $request->input('patirtis');
        $skelbimas->kategorijos_id = $request->input('kategorijos_id');
        $skelbimas->paslaugu_atstumai = $request->input('paslaugu_atstumai');
        $skelbimas->statuso_id = $request->input('statuso_id');
        $skelbimas->asmens_tipas = $request->input('asmens_tipas');
        $skelbimas->miestas = $request->input('miestas');
        $skelbimas->vartotojo_id = $request->input('vartotojo_id');
        $skelbimas->save();
    }
    return Redirect::to('/skelbimai')->with('success', 'Skelbimas pridėtas');
    }
    public function deleteSkelbimus($id)
    {
        $data=Skelbimas::find($id);
        $data->delete();
    return Redirect::to('/skelbimai ')->with('success', 'Skelbimas pašalintas');
    }
    function showData($id)
    {
        $data = Skelbimas::find($id);
        $skelbimai = Skelbimas::all();
        $vartotojai = Vartotojas::all();
        $kategorijos = Kategorija::all();
        $statusai = Statusas::all();
        return view('skelbimaiEdit',['vartotojai'=>$vartotojai,'data'=>$data,'skelbimai'=>$skelbimai,'kategorijos'=>$kategorijos,'statusai'=>$statusai]);
    }
    function update(Request $request)
    {
        $data = Skelbimas::find($request->id);
        $data->pavadinimas=$request->pavadinimas;
        $data->aprasymas=$request->aprasymas;
        $data->valandinis=$request->valandinis;
        $data->biudzetas=$request->biudzetas;
        $data->data=date('Y-m-d H:i:s');
        $data->telefonas=$request->telefonas;
        $data->el_pastas=$request->el_pastas;
        $data->galerijos_nuoroda=$request->galerijos_nuoroda;
        $data->patirtis=$request->patirtis;
        $data->kategorijos_id=$request->kategorijos_id;
        $data->paslaugu_atstumai=$request->paslaugu_atstumai;
        $data->statuso_id=$request->statuso_id;
        $data->asmens_tipas=$request->asmens_tipas;
        $data->miestas=$request->miestas;
        $data->vartotojo_id=$request->vartotojo_id;
        $data->save();
        return Redirect::to('/skelbimai ')->with('success', 'Skelbimas redaguotas');
    }
}
