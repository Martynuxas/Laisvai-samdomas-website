<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Kategorija;

class KategorijosController extends Controller
{
    public function index()
    {
        $kategorijos = Kategorija::all();
        return view('kategorijos', ['kategorijos'=>$kategorijos]);
    }
    public function insertKategorijos(Request $request)
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
        $kategorija = new Kategorija();
        $kategorija->pavadinimas = $request->input('pavadinimas');
        $kategorija->save();
    }
    return Redirect::to('/kategorijos')->with('success', 'Kategorija pridėta');
    }
    public function deleteKategorijos($id)
    {
        $data=Kategorija::find($id);
        $data->delete();
    return Redirect::to('/kategorijos ')->with('success', 'Kategorija pašalinta');
    }
    function showData($id)
    {
        $data = Kategorija::find($id);
        $kategorijos = Kategorija::all();
        return view('kategorijosEdit',['kategorijos'=>$kategorijos,'data'=>$data]);
    }
    function update(Request $request)
    {
        $data = Kategorija::find($request->id);
        $data->pavadinimas=$request->pavadinimas;
        $data->save();
        return Redirect::to('/kategorijos ')->with('success', 'Kategorija redaguota');
    }


}
