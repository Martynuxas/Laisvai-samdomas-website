<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;

class UzklausaController extends Controller
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
        return view('uzklausa', ['kategorijos'=>$kategorijos]);
    }
}
