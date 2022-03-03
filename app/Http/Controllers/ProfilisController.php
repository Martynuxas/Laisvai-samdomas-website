<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Vartotojas;
class ProfilisController extends Controller
{
    function index($id)
    {
        $data = Vartotojas::find($id);
        return view('profilis',['data'=>$data]);
    }
}
