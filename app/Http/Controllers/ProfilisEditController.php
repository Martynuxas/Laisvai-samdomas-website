<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Image;

class ProfilisEditController extends Controller
{
    public function index()
    {
        return view('profilioRedagavimas');
    }
    function profilisUpload(Request $request)
    {
        $user = Auth::user();
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));

            $user->avatar = $filename;
        } 
        $user->apie = $request->editor; 
        $user->numeris = $request->numeris; 
        $user->updated_at = date('Y-m-d H:i:s');
        $user->asmens_tipas = $request->asmens_tipas; 
        $user->email = $request->elpastas;
        $user->name = $request->name; 
        $user->miestas = $request->miestas;
        $user->puslapis = $request->puslapis;
        $user->github = $request->github;
        $user->save();
        return Redirect::to('/profilis/'. Auth::user()->id);
    }
}
