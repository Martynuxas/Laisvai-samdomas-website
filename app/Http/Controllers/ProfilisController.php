<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Vartotojas;
use App\Models\Atsiliepimas;
use App\Models\Ivertinimas;
use Auth;
class ProfilisController extends Controller
{
    function index($id)
    {
        $data = Vartotojas::find($id);
        $atsiliepimai = Atsiliepimas::with('userKomentavo')
        ->where('vartotojo_id', '=', $id)
        ->orderBy('data', 'desc')
        ->paginate(5);
        $uzsakymuIvertinimai = Ivertinimas::
        where('vartotojoId', '=', $id)
        ->paginate(3);
        return view('profilis',['data'=>$data, 'atsiliepimai'=>$atsiliepimai, 'uzsakymuIvertinimai' => $uzsakymuIvertinimai]);
    }
    public function deleteAtsiliepima($id){
        $data = Atsiliepimas::find($id);
        if(Auth::user()->id == $data->kas_komentavo)
        {
            $data->delete();
            return Redirect::back()->with('message', 'Atsiliepimas pašalintas');
        }
        return Redirect::back();
    }
    public static function countAtsiliepimus($id){
        $countAtsiliepimus = Atsiliepimas::all()
        ->where('vartotojo_id', '=', $id)
        ->count();
        return $countAtsiliepimus;
    }
    public function insertAtsiliepima(Request $request)
    {
        $validator = Validator::make(
            ['tekstas' => $request->input('tekstas')
            ],
            [ 'tekstas' => ['required', 'string', 'max:250']
            ]
            );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
        $atsiliepimas = new Atsiliepimas();
        $kamKomentuoja = $request->input('id');
        $atsiliepimas->vartotojo_id = $kamKomentuoja;
        $atsiliepimas->kas_komentavo = Auth::user()->id;
        $atsiliepimas->tekstas = $request->input('tekstas');
        $atsiliepimas->data = date('Y-m-d H:i:s');
        $atsiliepimas->save();
        $vardas = Auth::user()->name;
        PranesimaiController::addMessage($kamKomentuoja, "Jums parašė atsiliepimą: $vardas");
        }
        return Redirect::back()->with('message', 'Atsiliepimas patalpintas!');
    }
}
