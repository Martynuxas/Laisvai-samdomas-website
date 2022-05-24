<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UserController extends Controller
{
    //
    function index()
    {
        $data = User::all();
        return view('pradinis',['data'=>$data]);
    }
}
