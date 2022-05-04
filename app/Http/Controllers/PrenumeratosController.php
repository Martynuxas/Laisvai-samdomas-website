<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Prenumerata;
use App\Models\Kategorija;
use Auth;

class PrenumeratosController extends Controller
{
    public function index()
    {
    $kategorijos = Kategorija::all();
    $prenumeratos = Prenumerata::where('vartotojo_id', '=', Auth::user()->id)->paginate(5);
    return view('prenumeratos', ['kategorijos'=>$kategorijos, 'prenumeratos' => $prenumeratos]);
    }
    public function deletePrenumerata($id){
        $data=Prenumerata::find($id);
        $data->delete();
    return Redirect::back()->with('message', 'Prenumerata pašalinta');
    }
    public function kurtiPrenumerata(Request $request){
            if($this->arKategorijaPrenumeruota(Auth::user()->id, $request->kategorija) == false){
            $prenumerata = new Prenumerata();
    
            $prenumerata->kategorijos_id = $request->kategorija;
            $prenumerata->vartotojo_id = Auth::user()->id;
            $prenumerata->data = date('Y-m-d H:i:s');
            $prenumerata->save();
            return Redirect::back()->with('message', 'Užprenumeravote kategoriją!');
            }
            return Redirect::back()->with('alert', 'Jūs jau užsiprenumeravęs šią kategoriją!');
    }
    function arKategorijaPrenumeruota($vartotojoid, $kategorijosid){
        $tikrinam = Prenumerata::all()
        ->where('kategorijos_id', '=', $kategorijosid)
        ->where('vartotojo_id', '=', $vartotojoid);
        if($tikrinam->count() == 0)
        {
            return false;
        }
        return true;
    }
}
