<?php

namespace App\Http\Controllers;

use App\Models\AdminFaq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{

    public function index()
    {
        $adminfaqs = AdminFaq::get();

        return response()->json([
            'adminfaqs' => $adminfaqs
        ], 200);

    }

    public function getAdminFaqs()
    {
        $adminfaqs = AdminFaq::get();

        return response()->json([
            'adminfaqs' => $adminfaqs
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        AdminFaq::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json('success', 200);
    }

    public function show(AdminFaq $adminFaq, $id)
    {
        $adminfaq = AdminFaq::findOrFail($id);
        // return $about;
        return response()->json([
            'adminfaq' => $adminfaq
        ], 200);
    }

    public function edit(AdminFaq $adminFaq)
    {
        //
    }

    public function update(Request $request, AdminFaq $adminFaq)
    {
        $adminfaq = AdminFaq::find($request->id);

        $adminfaq->title = $request->title;
        $adminfaq->description = $request->description;

        $adminfaq->save();

        return response()->json('success', 200);
    }

    public function destroy(AdminFaq $adminFaq)
    {
        //
    }
}
