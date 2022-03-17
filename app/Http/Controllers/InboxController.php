<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Inbox::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return response()->json('success', 200);
    }

    public function show(Inbox $inbox)
    {
        //
    }

    public function edit(Inbox $inbox)
    {
        //
    }

    public function update(Request $request, Inbox $inbox)
    {
        //
    }

    public function destroy(Inbox $inbox)
    {
        //
    }
}
