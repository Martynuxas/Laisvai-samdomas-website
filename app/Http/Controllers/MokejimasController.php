<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Models\Vartotojas;
use Auth;
use App\Models\Mokejimas;

class MokejimasController extends Controller
{
    public function mokejimasRed(Request $request){
        return $this->mokejimas($request->input('suma'));
    }
    public function mokejimas($suma)
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Kb1UtJjjYTuymbzjshgogX4sY9rHiYS9iGDeU9v8uAFDBxUBpdLa8GfM3TxlLjkZrEzsoHBZOGSVUi9skx4ezKJ00Eirda2WG');

		$amount = 1 * $suma;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'amount' => $amount,
			'currency' => 'EUR',
			'description' => 'Nusipirkta platformos valiuta',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('mokejimas',compact('intent'),['data'=>$payment_intent->amount/100]);

    }

    public function poMokejimo(Request $request)
    {
        $data = Vartotojas::find(Auth::user()->id);
        $data->valiuta=($data->valiuta)+($request->input('suma')-($request->input('suma')*0.03+0.3));
        $data->save();

        $mokejimas = new Mokejimas();
        $mokejimas->kiekis = $request->input('suma');
        $mokejimas->pomokesciu = $request->input('suma')-(($request->input('suma')*0.03)+0.3);
        $mokejimas->data = date('Y-m-d H:i:s');
        $mokejimas->vartotojo_id = Auth::user()->id;
        $mokejimas->vardas = $request->input('name');
        $mokejimas->gatve = $request->input('street');
        $mokejimas->miestas = $request->input('city');
        $mokejimas->salis = $request->input('country');
        $mokejimas->pasto_kodas = $request->input('post-code');
        $mokejimas->save();

        #toastr()->success('Apmokėjimas sėkmingai atliktas!');
        return redirect('/home');
    }
}