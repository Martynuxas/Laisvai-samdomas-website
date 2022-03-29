<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Kategorija;
use App\Models\Uzklausa;
use Auth;

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
    }
    return Redirect::to('/kurti')->with('success', 'Užklausa patvirtinta');
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
    }
    return Redirect::to('/valdymas')->with('success', 'Užklausa atnaujinta');
    }
}
