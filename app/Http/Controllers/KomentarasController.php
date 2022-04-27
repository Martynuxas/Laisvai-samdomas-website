<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentaras;
use Auth;
use Redirect;
use Validator;

class KomentarasController extends Controller
{
    public function countKomentarus($id){
        $countKomentarus = Komentaras::all()
        ->where('paslaugos_id', '=', $id)
        ->count();
        return $countKomentarus;
    }
    public function deleteKomentara($id){
        $data = Komentaras::find($id);
        if(Auth::user()->id == $data->vartotojo_id)
        {
            $data->delete();
            return Redirect::back()->with('success', 'Komentaras pašalintas');
        }
        return Redirect::back();
    }
    public function insertKomentara(Request $request)
    {
        $validator = Validator::make(
            ['tekstas' => $request->input('tekstas')
            ],
            [ 'tekstas' => ['required', 'string', 'max:250']
            ]
            );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
        $komentaras = new Komentaras();
        $kamKomentuoja = $request->input('vartotojoid');
        $komentaras->vartotojo_id = Auth::user()->id;
        $komentaras->paslaugos_id = $request->input('id');
        $komentaras->tekstas = $request->input('tekstas');
        $komentaras->data = date('Y-m-d H:i:s');
        $komentaras->save();
        $vardas = Auth::user()->name;
        PranesimaiController::addMessage($kamKomentuoja, "Jums parašė komentarą: $vardas");
        }
        return Redirect::back()->with('success', 'Komentaras patalpintas!');
    }
}