<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    public function index()
    {
        $grades = Grade::get();

        return response()->json([
            'grades' => $grades
        ], 200);
    }

    public function getGrades()
    {
        $grades = Grade::get();

        return response()->json([
            'grades' => $grades
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'name' => 'required'
        ]);

        Grade::create([
            'name' => $request->name,
            'slug' => $request->name
        ]);

        return response()->json('success', 200);
    }

    public function show(Grade $grade)
    {
        //
    }

    public function edit(Grade $grade)
    {
        //
    }

    public function update(Request $request, Grade $grade)
    {
        $grade = Grade::find($request->id);

        $grade->name = $request->name;

        $grade->save();

        return response()->json('success', 200);
        
    }

    public function destroy(Grade $grade)
    {
        //
    }
}
