<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statusas;

class StatusaiController extends Controller
{
    public function index()
    {
    $statusai = Statusas::all();

    return view('skelbimo_statusas', ['statusai'=>$statusai]);
    }
}
