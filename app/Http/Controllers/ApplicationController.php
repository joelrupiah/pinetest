<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with('grade')->get();

        return response()->json([
            'applications' => $applications
        ], 200);
    }

    public function create()
    {
        //
    }

    public function getSingleApplication(Application $application, $id)
    {
        $application = Application::with('grade')->where('id', $id)->first();

        return response()->json([
            'application' => $application
        ], 200);
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'grade_id' => 'required',
            'parent_name' => 'required',
            'parent_phone' => 'required',
            'parent_email' => 'nullable',
            'student_name' => 'required',
            'student_age' => 'required'
        ]);

        Application::create([
            'grade_id' => $request->grade_id,
            'parent_name' => $request->parent_name,
            'parent_phone' => $request->parent_phone,
            'parent_email' => $request->parent_email,
            'student_name' => $request->student_name,
            'student_age' => $request->student_age,
        ]);

        return response()->json('success', 200);
    }

    public function show(Application $application)
    {
        //
    }

    public function edit(Application $application)
    {
        //
    }

    public function update(Request $request, Application $application)
    {
        $application = Application::find($request->id);
        $application->status = implode(",",  $request['status']);
        $application->update();

        return response()->json('success', 200);
    }

    public function destroy(Application $application)
    {
        //
    }
}
