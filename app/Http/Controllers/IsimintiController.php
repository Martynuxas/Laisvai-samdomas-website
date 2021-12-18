<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Isiminti;
use App\Models\Vartotojas;
use App\Models\Skelbimas;

class IsimintiController extends Controller
{
    public function index()
    {
        $isiminti = Isiminti::all();
        $vartotojai = Vartotojas::all();
        $skelbimai = Skelbimas::all();
        return view('isiminti', ['isiminti'=>$isiminti,'vartotojai'=>$vartotojai,'skelbimai'=>$skelbimai]);
    }
    public function insertIsiminta($id)
    {
        $skelbimas = Skelbimas::find($id);
        $vartotojas = Vartotojas::find(Auth::user()->id);

        
        $isiminti = new Isiminti();
        $isiminti->vartotojo_id = $vartotojas->id;
        $isiminti->skelbimo_id = $skelbimas->id;
        $isiminti->save();
        return Redirect::to('/isiminti')->with('success', 'Skelbimas įsimintas');
    }
    public function insertIsimintus(Request $request)
    {
        $validator = Validator::make(
        ['name' => $request->input('vartotojo_id'),
        'name' => $request->input('skelbimo_id')
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
        $isiminti = new Isiminti();
        $isiminti->vartotojo_id = $request->input('vartotojo_id');
        $isiminti->skelbimo_id = $request->input('skelbimo_id');
        $isiminti->save();
    }
    return Redirect::to('/isiminti')->with('success', 'Isiminimas pridėtas');
    }
    public function deleteIsimintus($id)
    {
        $data=Isiminti::find($id);
        $data->delete();
    return Redirect::to('/isiminti ')->with('success', 'Isiminimas pašalinta');
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
        return Redirect::to('/isiminti ')->with('success', 'Isiminimas redaguotas');
    }
}
