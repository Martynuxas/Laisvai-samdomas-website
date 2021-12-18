<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Prenumerata;
use App\Models\Vartotojas;
use App\Models\Kategorija;

class PrenumeratosController extends Controller
{
    public function index()
    {
    $prenumeratos = Prenumerata::with('kategorijos')->get();
    $kategorijos = Kategorija::all();
    $vartotojai = Vartotojas::all();
    return view('prenumerata', ['prenumeratos'=>$prenumeratos,'kategorijos'=>$kategorijos,'vartotojai'=>$vartotojai]);
    }
    public function insertPrenumeratas(Request $request)
    {
        $validator = Validator::make(
        ['name' => $request->input('kategorijos_id'),
        'name' => $request->input('vartotojo_id')
        ],
        [ 'name' => 'required|alpha_num',
            'name' => 'required|alpha_num'
        ]
        );
    if ($validator->fails())
    {
        return Redirect::back()->withErrors($validator);
    }
    else
    {
        $prenumerata = new Prenumerata();
        $prenumerata->kategorijos_id = $request->input('kategorijos_id');
        $prenumerata->vartotojo_id = $request->input('vartotojo_id');
        $prenumerata->save();
    }
    return Redirect::to('/prenumeratos')->with('success', 'Prenumerata pridėta');
    }
    public function deletePrenumeratas($id)
    {
        $data=Prenumerata::find($id);
        $data->delete();
    return Redirect::to('/prenumeratos ')->with('success', 'Prenumerata pašalinta');
    }
    function showData($id)
    {
        $data = Prenumerata::find($id);
        $prenumerata = Prenumerata::all();
        $vartotojai = Vartotojas::all();
        $kategorijos = Kategorija::all();
        return view('PrenumerataEdit', ['prenumeratos'=>$prenumerata,'vartotojai'=>$vartotojai,'kategorijos'=>$kategorijos,'data'=>$data]);
    }
    function update(Request $request)
    {
        $data = Prenumerata::find($request->id);
        $data->kategorijos_id=$request->kategorijos_id;
        $data->vartotojo_id=$request->vartotojo_id;
        $data->save();
        return Redirect::to('/prenumeratos ')->with('success', 'Prenumerata redaguota');
    }
}
