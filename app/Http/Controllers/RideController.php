<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ride;

// Ensure the Ride model exists in the specified namespace

class RideController extends Controller
{
    public function requestRide(Request $request) {
        $ride = Ride::create([
            'user_id' => auth()->id(),
            'pickup_lat' => $request->pickup_lat,
            'pickup_lng' => $request->pickup_lng,
            'dropoff_lat' => $request->dropoff_lat,
            'dropoff_lng' => $request->dropoff_lng,
        ]);
        return response()->json($ride);
    }
}
