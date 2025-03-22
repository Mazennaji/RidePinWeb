<?php

use Stripe\Stripe;
use Stripe\Charge;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = Charge::create([
            'amount' => $request->amount * 100, // Amount in cents
            'currency' => 'usd',
            'source' => $request->stripeToken,
        ]);

        return response()->json(['success' => true, 'charge' => $charge]);
    }
}
