<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skelbimas;

class HomeController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skelbimai = Skelbimas::orderByDesc('skelbimo_id')->take(-3)->get();
        return view('index', ['skelbimai'=>$skelbimai]);
    }
}
