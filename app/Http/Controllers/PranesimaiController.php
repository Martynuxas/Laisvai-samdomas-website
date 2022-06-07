<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Auth;
use App\Models\ChMessage;
use App\Models\Pranesimas;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;
use App\Models\Vartotojas;

class PranesimaiController extends Controller
{
    public function index()
    {
        $pranesimai = Pranesimas::where('vartotojo_id', '=', Auth::user()->id)
                       ->orderBy('data', 'desc')
                       ->paginate(10);
        return view('pranesimuSarasas',['pranesimai'=>$pranesimai]);
    }
    public function addMessage($vartotojo_id, $tekstas)
    {
        $pranesimas = new Pranesimas();
        $pranesimas->data = date('Y-m-d H:i:s');
        $pranesimas->vartotojo_id = $vartotojo_id;
        $pranesimas->tekstas = $tekstas;

        $vartotojas = Vartotojas::find($vartotojo_id);
        $elpastas = $vartotojas->email;
        //Mail::to("$elpastas")->send(new Notification());
        $pranesimas->save();
    }
    public static function getMessagesSum()
    {
        $data = ChMessage::where('to_id', '=', Auth::user()->id)
                       ->where('seen',   '=', 0)
                       ->get();
        return count($data);
    }
}
