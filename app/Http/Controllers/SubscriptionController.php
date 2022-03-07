<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'email' => 'required'
        ]);

        Subscription::create([
            'email' => $request->email
        ]);

        return response()->json('success', 200);
    }
}
