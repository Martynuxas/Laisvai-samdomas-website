<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PaslaugosController extends Controller
{
    public function index()
    {
        return view('paslaugos');
    }

}
