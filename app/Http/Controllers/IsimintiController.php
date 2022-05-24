<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Isiminti;
use App\Models\Vartotojas;
use App\Models\Skelbimas;
use App\Models\IsimintasVartotojas;
use App\Models\IsimintaPaslauga;

class IsimintiController extends Controller
{
    public function getLists(){
        $isimintosPaslaugos = IsimintaPaslauga::with('paslaugos')
        ->where('IsiminusioVartotojoId', '=', Auth::user()->id)
        ->orderBy('data', 'desc')
        ->paginate(10);

        $isimintiVartotojai = IsimintasVartotojas::with('users')
        ->where('IsiminusioVartotojoId', '=', Auth::user()->id)
        ->orderBy('data', 'desc')
        ->paginate(10);
        return view('isimintuVartotojuPaslauguSarasas', ['isimintiVartotojai'=>$isimintiVartotojai,'isimintosPaslaugos'=>$isimintosPaslaugos]);
    }
    public static function arPaslaugaIsiminta($vartotojoId, $paslaugosId){
        $tikrinam = IsimintaPaslauga::all()
        ->where('IsiminusioVartotojoId', '=', $vartotojoId)
        ->where('isimintosPaslaugosId', '=', $paslaugosId);
        if($tikrinam->count() == 0)
        {
            return false;
        }
        return true;
    }
    public function pamirstiPaslauga($id){
        $pamirsti = IsimintaPaslauga::all()
        ->where('isimintosPaslaugosId', '=', $id)
        ->where('IsiminusioVartotojoId', '=', Auth::user()->id);
        $pamirsti->each->delete();

        return Redirect::back()->with('message', 'Paslauga pamiršta!');
    }
    public function isimintiPaslauga(Request $request){
        if($this->arPaslaugaIsiminta(Auth::user()->id, $request->id) == false){
        $isiminta = new IsimintaPaslauga();

        $isiminta->isimintosPaslaugosId = $request->id;
        $isiminta->IsiminusioVartotojoId = Auth::user()->id;
        $isiminta->data = date('Y-m-d H:i:s');
        $isiminta->save();
        return Redirect::back()->with('message', 'Paslauga įsiminta');
        }
        return Redirect::back()->with('alert', 'Jūs jau įsimines šią paslaugą!');
    }
    public static function arVartotojasIsimintas($vartotojoId, $kasIsimineId)
    {
        $tikrinam = IsimintasVartotojas::all()
        ->where('isimintoVartotojoId', '=', $vartotojoId)
        ->where('IsiminusioVartotojoId', '=', $kasIsimineId);
        if($tikrinam->count() == 0)
        {
            return false;
        }
        return true;
    }
    public function isimintiVartotojaPrideti(Request $request)
    {   
        if($this->arVartotojasIsimintas($request->vartotojoid, $request->kuriisimineid) == false)
        {
            $isimine = new IsimintasVartotojas;
            $isimine->isimintoVartotojoId = $request->vartotojoid;
            $isimine->isiminusioVartotojoId = $request->kuriisimineid;
            $isimine->data = date('Y-m-d H:i:s');
            $isimine->save();
            return Redirect::back()->with('message', 'Vartotojas įsimintas');
        }
        return Redirect::back()->with('alert', 'Jūs jau įsimines šį vartotoją!');
    }
    public function insertIsiminta($id)
    {
        $skelbimas = Skelbimas::find($id);
        $vartotojas = Vartotojas::find(Auth::user()->id);

        
        $isiminti = new Isiminti();
        $isiminti->vartotojo_id = $vartotojas->id;
        $isiminti->skelbimo_id = $skelbimas->id;
        $isiminti->save();
        return Redirect::to('/isiminti')->with('message', 'Skelbimas įsimintas');
    }
    public function insertIsimintus(Request $request)
    {
        $validator = Validator::make(
        ['id' => [$request->input('vartotojo_id'),$request->input('skelbimo_id')]
        ],
        [ 'id' => 'required|alpha_num'
        ]
        );
    if ($validator->fails())
    {
        return Redirect::back()->withErrors($validator);
    }
    else
    {
        $isiminti = new Isiminti();
        $isiminti->vartotojo_id = $request->input('vartotojo_id');
        $isiminti->skelbimo_id = $request->input('skelbimo_id');
        $isiminti->save();
    }
    return Redirect::to('/isiminti')->with('message', 'Isiminimas pridėtas');
    }
    public function deleteIsimintus($id)
    {
        $data=Isiminti::find($id);
        $data->delete();
    return Redirect::to('/isiminti ')->with('message', 'Isiminimas pašalintas');
    }
    public function deleteIsimintaPaslauga($id)
    {
        $data=IsimintaPaslauga::find($id);
        $data->delete();
    return Redirect::to('/tab1')->with('message', 'Isiminimas pašalintas');
    }
    public function deleteIsimintaVartotoja($id)
    {
        $data=IsimintasVartotojas::find($id);
        $data->delete();
    return Redirect::to('/tab2')->with('message', 'Isiminimas pašalintas');
    }
    function showData($id)
    {
        $data = Isiminti::find($id);
        $isiminti = Isiminti::all();
        $vartotojai = Vartotojas::all();
        $skelbimai = Skelbimas::all();
        return view('isimintiEdit', ['isiminti'=>$isiminti,'vartotojai'=>$vartotojai,'skelbimai'=>$skelbimai,'data'=>$data]);
    }
    function update(Request $request)
    {
        $data = Isiminti::find($request->id);
        $data->vartotojo_id=$request->vartotojo_id;
        $data->skelbimo_id=$request->skelbimo_id;
        $data->save();
        return Redirect::to('/isiminti ')->with('message', 'Isiminimas redaguotas');
    }
}
