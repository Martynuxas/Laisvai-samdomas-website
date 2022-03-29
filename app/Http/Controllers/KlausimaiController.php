<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Klausimas;
use Auth;

class KlausimaiController extends Controller
{
    public function index()
    {
    return view('kurtiKlausimus');
    }

    public function showData($id)
    {
    $data = Klausimas::find($id);
    return view('redaguotiKlausimus',['data'=>$data]);
    }
    
    public function deleteKlausima($id)
    {
        $data=Klausimas::find($id);
        $data->delete();
        return Redirect::to('/valdymas ')->with('success', 'DUK pašalintas');
    }

    public function sukurtiKlausimus(Request $request)
    {
        $validator = Validator::make(
            ['pavadinimas' => $request->input('pavadinimas'),
            'klausimas1' => $request->input('klausimas1'),
            'klausimas2' => $request->input('klausimas2'),
            'klausimas3' => $request->input('klausimas3'),
            'klausimas4' => $request->input('klausimas4'),
            'klausimas5' => $request->input('klausimas5'),
            'atsakymas1' => $request->input('atsakymas1'),
            'atsakymas2' => $request->input('atsakymas2'),
            'atsakymas3' => $request->input('atsakymas3'),
            'atsakymas4' => $request->input('atsakymas4'),
            'atsakymas5' => $request->input('atsakymas5')
            ],
            ['pavadinimas' => 'required|max:50',
            'klausimas1' => 'nullable|max:100',
            'klausimas2' => 'nullable|max:100',
            'klausimas3' => 'nullable|max:100',
            'klausimas4' => 'nullable|max:100',
            'klausimas5' => 'nullable|max:100',
            'atsakymas1' => 'nullable|max:100',
            'atsakymas2' => 'nullable|max:100',
            'atsakymas3' => 'nullable|max:100',
            'atsakymas4' => 'nullable|max:100',
            'atsakymas5' => 'nullable|max:100'
            ]
            );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
        $klausimas = new Klausimas();
        $klausimas->pavadinimas=$request->pavadinimas;
        $klausimas->vartotojo_id=Auth::user()->id;
        $klausimas->klausimas1=$request->klausimas1;
        $klausimas->klausimas2=$request->klausimas2;
        $klausimas->klausimas3=$request->klausimas3;
        $klausimas->klausimas4=$request->klausimas4;
        $klausimas->klausimas5=$request->klausimas5;
        $klausimas->atsakymas1=$request->atsakymas1;
        $klausimas->atsakymas2=$request->atsakymas2;
        $klausimas->atsakymas3=$request->atsakymas3;
        $klausimas->atsakymas4=$request->atsakymas4;
        $klausimas->atsakymas5=$request->atsakymas5;
        $klausimas->atnaujintas=date('Y-m-d H:i:s');
        $klausimas->save();
        }
        return Redirect::back()->with('success', 'DUK sukurtas!');
    }
    public function updateKlausimus(Request $request)
    {
        $validator = Validator::make(
            ['pavadinimas' => $request->input('pavadinimas'),
            'klausimas1' => $request->input('klausimas1'),
            'klausimas2' => $request->input('klausimas2'),
            'klausimas3' => $request->input('klausimas3'),
            'klausimas4' => $request->input('klausimas4'),
            'klausimas5' => $request->input('klausimas5'),
            'atsakymas1' => $request->input('atsakymas1'),
            'atsakymas2' => $request->input('atsakymas2'),
            'atsakymas3' => $request->input('atsakymas3'),
            'atsakymas4' => $request->input('atsakymas4'),
            'atsakymas5' => $request->input('atsakymas5')
            ],
            ['pavadinimas' => 'required|max:50',
            'klausimas1' => 'nullable|max:100',
            'klausimas2' => 'nullable|max:100',
            'klausimas3' => 'nullable|max:100',
            'klausimas4' => 'nullable|max:100',
            'klausimas5' => 'nullable|max:100',
            'atsakymas1' => 'nullable|max:100',
            'atsakymas2' => 'nullable|max:100',
            'atsakymas3' => 'nullable|max:100',
            'atsakymas4' => 'nullable|max:100',
            'atsakymas5' => 'nullable|max:100'
            ]
            );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
        $klausimas = Klausimas::find($request->id);
        $klausimas->pavadinimas=$request->pavadinimas;
        $klausimas->vartotojo_id=Auth::user()->id;
        $klausimas->klausimas1=$request->klausimas1;
        $klausimas->klausimas2=$request->klausimas2;
        $klausimas->klausimas3=$request->klausimas3;
        $klausimas->klausimas4=$request->klausimas4;
        $klausimas->klausimas5=$request->klausimas5;
        $klausimas->atsakymas1=$request->atsakymas1;
        $klausimas->atsakymas2=$request->atsakymas2;
        $klausimas->atsakymas3=$request->atsakymas3;
        $klausimas->atsakymas4=$request->atsakymas4;
        $klausimas->atsakymas5=$request->atsakymas5;
        $klausimas->atnaujintas=date('Y-m-d H:i:s');
        $klausimas->save();
        }
        return Redirect::back()->with('success', 'DUK atnaujintas!');
    }


}