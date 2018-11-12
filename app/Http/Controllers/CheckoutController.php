<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function pay(){
        //dd(request()->all());
        \Stripe\Stripe::setApiKey('sk_test_7np68AQF6jinuvwwNX09mHHf');
        $charge = \Stripe\Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'source' => request()->stripeToken
        ]);
        //dd('fgfsdgfdg');
        //echo $charge;
        Session::flash('success', 'Purchase successful, wait for our email.');
        Cart::destroy();

        // email send
        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/');



    }

}
