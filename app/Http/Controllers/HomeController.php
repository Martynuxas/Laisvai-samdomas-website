<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skelbimas;
use Auth;
use Hash;

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
        $skelbimai = Skelbimas::orderByDesc('id')->take(4)
        ->where('busena', '=', 'patvirtinta')->get();
        return view('pradinis', ['skelbimai'=>$skelbimai]);
    }
    public function showChangePasswordGet() {
        return view('slaptazodzioKeitimas');
    }

    public function changePasswordPost(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Blogai įvedėte esama slaptažodį.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","Naujas slaptažodis negali būti toks pats kaip senas.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Slaptažodis pakeistas!");
    }
}
