<?php

namespace App\Http\Controllers;

use App\Models\AboutHistory;
use Illuminate\Http\Request;
use Image;

class AboutHistoryController extends Controller
{

    public function index()
    {
        $abouthistories = AboutHistory::get();

        return response()->json([
            'abouthistories' => $abouthistories
        ], 200);
    }

    public function getAboutHistory()
    {
        $abouthistories = AboutHistory::get();

        return response()->json([
            'abouthistories' => $abouthistories
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return $request; 570 x 450
        // dd($request);
        $request->validate([
            'heading' => 'required',
            'year' => 'required',
            'headingYear' => 'required',
            'firstDescription' => 'required',
            'lastDescription' => 'required',
            // 'image' => 'required|image|mimes:jpeg,bmp,png,gif,svg,pdf',
        ]);

        $file = explode(';', $request->image);
        $file = explode('/', $file[0]);
        $file_ex = end($file);

        $file_name = \Str::random(10) . '.' . $file_ex;

        $product = AboutHistory::create([
            'heading' => $request->heading,
            'year' => $request->year,
            'headingYear' => $request->headingYear,
            'firstDescription' => $request->firstDescription,
            'lastDescription' => $request->lastDescription,
            'image' => $file_name,
        ]);

        Image::make($request->image)->resize(570, 450)->save(public_path('/uploads/img/about-history/').$file_name);
        // Image::make($request->image)->resize(570, 450)->save(public_path('/uploads/products/').$file_name);
        
        return response()->json('success', 200);
    }

    public function show(AboutHistory $aboutHistory, $id)
    {
        $abouthistory = AboutHistory::findOrFail($id);

        return response()->json([
            'abouthistory' => $abouthistory
        ], 200);
    }

    public function edit(AboutHistory $aboutHistory)
    {
        //
    }

    public function update(Request $request, AboutHistory $aboutHistory)
    {
        $abouthistory = AboutHistory::find($request->id);

        $abouthistory->heading = $request->heading;
        $abouthistory->year = $request->year;
        $abouthistory->headingYear = $request->headingYear;
        $abouthistory->firstDescription = $request->firstDescription;
        $abouthistory->lastDescription = $request->lastDescription;

        if ($request->image != $abouthistory->image) {
            $file = explode(';', $request->image);
            $file = explode('/', $file[0]);
            $file_ex = end($file);
            $file_name = \Str::random(10) . '.' . $file_ex;
            $abouthistory->image = $file_name;

            Image::make($request->image)->resize(570, 450)->save(public_path('/uploads/img/about-history/').$file_name);
            // Image::make($request->image)->resize(570, 450)->save(public_path('/uploads/img/about-history/').$file_name);
        }

        $abouthistory->save();

        return response()->json('success', 200);
    }

    public function destroy(AboutHistory $aboutHistory)
    {
        //
    }
}
