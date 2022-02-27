<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Mail\ReplyQuestion;
// use Illuminate\Support\Facades\Mail;

class FaqController extends Controller
{

    public function index()
    {
        $faqs = Faq::get();

        return response()->json([
            'faqs' => $faqs
        ], 200);

    }

    public function getUserFaq()
    {
        $faqs = Faq::get();

        return response()->json([
            'faqs' => $faqs
        ], 200);
    }

    public function getAdminQuestion(Request $request, $id)
    {
        $askedQuestion = Faq::find($request->id);
        return response()->json([
            'askedQuestion' => $askedQuestion
        ], 200);
    }

    public function replyQuestion(Request $request, $id)
    {
        // return $request;
        $askedQuestion = Faq::find($request->id);
        $formMessage = $request->message;

        $data = [
            'subject' => $askedQuestion->subject,
            'message' => $formMessage
        ];

        \Mail::to($askedQuestion->email)->send(new ReplyQuestion($data));

        // return $askedQuestion->email;
        
        return response()->json('success', 200);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return $request;
    }

    public function askQuestion(Request $request)
    {
        // return $request;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Faq::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json('success', 200);

    }

    public function show(Faq $faq)
    {
        //
    }

    public function edit(Faq $faq)
    {
        //
    }

    public function update(Request $request, Faq $faq)
    {
        //
    }

    public function destroy(Faq $faq)
    {
        //
    }
}
