<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Mail\EnquiryApplication;

class EnquiryController extends Controller
{
    
    public function index()
    {
        $enquiries = Enquiry::get();

        return response()->json([
            'enquiries' => $enquiries
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Enquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        $userData = [
            'title' => 'Pinecrest Academy',
            'body' => 'An enquiry was sent to the website from ' . $request->name . 'of email ' . $request->email . '. Please login to the administrator page to check the enquiry.'
        ];

        \Mail::to(env('MAIL_USERNAME'))->send(new EnquiryApplication($userData));

        return response()->json('success', 201);

    }

    public function show(Enquiry $enquiry, $id)
    {
        $enquiryQuestion = Enquiry::where('id', $id)->first();

        return response()->json([
            'enquiryQuestion' => $enquiryQuestion
        ], 200);
    }

    public function update(Request $request, Enquiry $enquiry)
    {
        $enquiry = Enquiry::find($request->id);
        $enquiry->status = implode(",",  $request['status']);
        $enquiry->update();

        return response()->json('success', 200);
    }

    public function destroy(Enquiry $enquiry)
    {
        //
    }
}
