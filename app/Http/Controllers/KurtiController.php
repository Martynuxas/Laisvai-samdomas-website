<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Kategorija;
use App\Models\Uzklausa;

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
    public function insertUzklausa(Request $request)
    {
        $validator = Validator::make(
        ['laikas' => $request->input('laikas'),
        'biudzetas' => $request->input('biudzetas'),
        'kategorija' => $request->input('kategorija'),
        'aprasymas' => $request->input('aprasymas')
        ],
        ['laikas' => 'required',
        'biudzetas' => 'required|numeric',
        'kategorija' => 'required|alpha_num',
        'aprasymas' => 'required|alpha_num|max:255'
        ]
        );
    if ($validator->fails())
    {
        return Redirect::back()->withErrors($validator);
    }
    else
    {
        $uzklausa = new Uzklausa();
        $uzklausa->laikas = $request->input('laikas');
        $uzklausa->biudzetas = $request->input('biudzetas');
        $uzklausa->kategorija = $request->input('kategorija');
        $uzklausa->aprasymas = $request->input('aprasymas');
        $uzklausa->save();
    }
    return Redirect::to('/kurti')->with('success', 'Užklausa patvirtinta');
    }
}
