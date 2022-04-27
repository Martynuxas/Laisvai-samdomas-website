<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;
use App\Models\Konkursas;
use Carbon\Carbon;
use Auth;
use Redirect;
use App\Models\KonkursoPasiulymas;
use Validator;

class KonkursasController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konkursai = Konkursas::orderBy('data', 'desc')
        ->paginate(10);
        return view('konkursai', ['konkursai'=>$konkursai,'Carbon' => 'Carbon\Carbon']);
    }
    public function rodytiPasiulymus($id)
    {
        $gautiPasiulymai = KonkursoPasiulymas::where('konkursoId', '=', $id)
        ->orderBy('data', 'desc')
        ->paginate(10);
        return view('pasiulymai',['gautiPasiulymai'=>$gautiPasiulymai]);
    }
    public function konkursoKurimas(){
        $kategorijos = Kategorija::all();
        return view('konkursoKurimas', ['kategorijos' => $kategorijos]);
    }
    public static function GautiPasiulymuSkaiciu($id){
        $rasti = KonkursoPasiulymas::where('konkursoId','=',$id)->get();
        return Count($rasti);
    }
    public function sukurtiKonkursa(Request $request)
    {
        $konkursas = new Konkursas();
        $konkursas->vartotojo_id = Auth::user()->id;
        $konkursas->galutineData = Carbon::parse( $konkursas->galutineData)->addDays($request->laikas);
        $konkursas->kategorija = $request->kategorija;
        $konkursas->pavadinimas = $request->pavadinimas;
        $konkursas->aprasymas = $request->aprasymas;
        $konkursas->data = date('Y-m-d H:i:s');
        $konkursas->atnaujintas = date('Y-m-d H:i:s');
        $konkursas->save();
        return Redirect::back()->with('success', 'Konkursas sukurtas!');
    }
    public function konkursoSiulymas(Request $request)
    {
        $konkursoPasiulymas = new KonkursoPasiulymas();
        $konkursoPasiulymas->konkursoId = $request->konkursoId;
        $konkursoPasiulymas->vartotojo_id = Auth::user()->id;
        $konkursoPasiulymas->dienuSkaicius = $request->dienuSkaicius;
        $konkursoPasiulymas->suma = $request->sumaDarbo;
        $konkursoPasiulymas->data=date('Y-m-d H:i:s');
        $konkursoPasiulymas->save();
        return Redirect::back()->with('success', 'Pasiūlymas pateiktas!');
    }
    public function arJauPasiule($id, $konkursoId){
        $rasti = KonkursoPasiulymas::All()
        ->where('konkursoId','=' , $konkursoId)
        ->where('vartotojo_id','=' , $id);
        if(count($rasti) > 0){
            return true;
        }
        return false;
    }
    public function showData($id)
    {
        $kategorijos = Kategorija::All();
        $data = Konkursas::find($id);
        return view('konkursasEdit',['data'=>$data,'kategorijos'=>$kategorijos]);
    }
    public function deleteKonkursa($id)
    {
        $data=Konkursas::find($id);
        $data->delete();
        return Redirect::to('/valdymas ')->with('success', 'Konkursas pašalinta');
    }

    public function updateKonkursa(Request $request)
    {
        $validator = Validator::make(
        ['kategorija' => $request->input('kategorija'),
        'aprasymas' => $request->input('aprasymas'),
        'pavadinimas' => $request->input('pavadinimas')
        ],
        ['kategorija' => 'required|alpha_num',
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
        $uzklausa = Konkursas::find($request->input('id'));
        $uzklausa->kategorija = $request->input('kategorija');
        $uzklausa->aprasymas = $request->input('aprasymas');
        $uzklausa->atnaujintas = date('Y-m-d H:i:s');
        $uzklausa->pavadinimas = $request->input('pavadinimas');
        $uzklausa->save();
    }
    return Redirect::to('/valdymas')->with('success', 'Konkursas atnaujinta');
    }
}