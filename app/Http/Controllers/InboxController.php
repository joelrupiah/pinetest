<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Http\Request;
use App\Mail\ReplyQuestion;

class InboxController extends Controller
{
    
    public function index()
    {
        $faqs = Inbox::get();

        return response()->json([
            'faqs' => $faqs
        ], 200);
    }

    public function create()
    {
        //
    }

    public function getAdminQuestion(Request $request, $id)
    {
        $askedQuestion = Inbox::find($request->id);
        return response()->json([
            'askedQuestion' => $askedQuestion
        ], 200);
    }

    public function replyQuestion(Request $request, $id)
    {
        // return $request;
        $askedQuestion = Inbox::find($request->id);
        $formMessage = $request->message;

        $data = [
            'subject' => $askedQuestion->subject,
            'message' => $formMessage
        ];

        \Mail::to($askedQuestion->email)->send(new ReplyQuestion($data));

        return response()->json('success', 200);

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
