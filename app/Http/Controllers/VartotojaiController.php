<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Vartotojas;

class VartotojaiController extends Controller
{
    public function index()
    {
    $vartotojai = Vartotojas::all();
    return view('vartotojai', ['vartotojai'=>$vartotojai]);
    }
    public function getName($id){
        $vartotojas = Vartotojas::find($id);
        return $vartotojas->name;
    }
    public function insertVartotojus(Request $request)
    {
        $validator = Validator::make(
        ['name' => [$request->input('name'), $request->input('miestas'), $request->input('role'), $request->input('asmens_tipas')],
        'lastname' => $request->input('lastname'),
        'email' => $request->input('email'),
        'password' => $request->input('password')
        ],
        [ 
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'max:255'],
        'lastname' => ['required', 'string', 'max:255']
        ]
        );
    if ($validator->fails())
    {
        return Redirect::back()->withErrors($validator);
    }
    else
    {
        $vartotojas = new Vartotojas();
        $vartotojas->name = $request->input('name');
        $vartotojas->lastname = $request->input('lastname');
        $vartotojas->email = $request->input('email');
        $vartotojas->password = Hash::make($request->input('password'));
        $vartotojas->miestas = $request->input('miestas');
        $vartotojas->asmens_tipas = $request->input('asmens_tipas');
        $vartotojas->role = $request->input('role');
        $vartotojas->created_at = date('Y-m-d H:i:s');
        $vartotojas->updated_at = date('Y-m-d H:i:s');

        $vartotojas->save();
    }
    return Redirect::to('/vartotojai')->with('success', 'Vartotojas pridėtas');
    }
    public function deleteVartotojus($id)
    {
        $data=Vartotojas::find($id);
        $data->delete();
    return Redirect::to('/vartotojai ')->with('success', 'Vartotojas pašalintas');
    }
    function showData($id)
    {
        $data = Vartotojas::find($id);
        $vartotojai = Vartotojas::all();
        return view('vartotojaiEdit',['vartotojai'=>$vartotojai,'data'=>$data]);
    }
    function update(Request $request)
    {
        $data = Vartotojas::find($request->id);
        $data->name=$request->name;
        $data->lastname=$request->lastname;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->asmens_tipas=$request->asmens_tipas;
        $data->role=$request->role;
        $data->miestas=$request->miestas;
        $data->updated_at=date('Y-m-d H:i:s');

        $data->save();
        return Redirect::to('/vartotojai ')->with('success', 'Vartotojas redaguotas');
    }
}
