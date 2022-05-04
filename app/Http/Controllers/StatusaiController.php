<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Statusas;

class StatusaiController extends Controller
{
    public function index()
    {
    $statusai = Statusas::all();

    return view('skelbimo_statusas', ['statusai'=>$statusai]);
    }
    public function insertStatusus(Request $request)
    {
        $validator = Validator::make(
        ['name' => $request->input('pavadinimas')
        ],
        [ 'name' => 'required|alpha_num'
        ]
        );
    if ($validator->fails())
    {
        return Redirect::back()->withErrors($validator);
    }
    else
    {
        $statusas = new Statusas();
        $statusas->pavadinimas = $request->input('pavadinimas');
        $statusas->save();
    }
    return Redirect::to('/statusai')->with('message', 'Statusas pridėtas');
    }
    public function deleteStatusus($id)
    {
        $data=Statusas::find($id);
        $data->delete();
    return Redirect::to('/statusai ')->with('message', 'Statusas pašalintas');
    }
    function showData($id)
    {
        $data = Statusas::find($id);
        $statusai = Statusas::all();
        return view('skelbimo_statusasEdit',['statusai'=>$statusai,'data'=>$data]);
    }
    function update(Request $request)
    {
        $data = Statusas::find($request->id);
        $data->pavadinimas=$request->pavadinimas;
        $data->save();
        return Redirect::to('/statusai ')->with('message', 'Statusas redaguota');
    }
}
