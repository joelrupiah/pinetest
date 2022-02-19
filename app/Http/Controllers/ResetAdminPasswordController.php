<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\ResetAdminPassword;

class ResetAdminPasswordController extends Controller
{
    public function resetAdminPassword(Request $request)
    {
        // return $request;
        $user = User::where('email', $request->email)->first();
        // return $user->id;
        $request->validate([
            'email' => 'required'
        ]);

        ResetAdminPassword::create([
            'user_id' => $user->id,
            'email' => $user->email
        ]);
    }
}
