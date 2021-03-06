<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Choose;
use Image;

class ChooseController extends Controller
{
    public function index()
    {
        $chooses = Choose::get();

        return response()->json([
            'chooses' => $chooses
        ], 200);
    }

    public function getUserChooses()
    {
        $chooses = Choose::get();

        return response()->json([
            'chooses' => $chooses
        ], 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $file = explode(';', $request->image);
        $file = explode('/', $file[0]);
        $file_ex = end($file);

        $file_name = \Str::random(10) . '.' . $file_ex;

        $choose = Choose::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $file_name
        ]);

        Image::make($request->image)->save(public_path('/uploads/img/choose/').$file_name);
        // Image::make($request->image)->resize(360, 220)->save(public_path('/uploads/img/choose/').$file_name);

        return response()->json('success', 200);

    }

    public function show(Choose $choose, $id)
    {
        // return $choose;
        $choose = Choose::where('id', $id)->first();

        return response()->json([
            'choose' => $choose
        ], 200);
    }

    public function update(Request $request, Choose $choose)
    {
        $choose = Choose::find($request->id);

        $mainImage = $choose->image;

        $choose->title = $request->title;
        $choose->description = $request->description;

        $imagePath = public_path('/uploads/img/choose/').$mainImage;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        if ($request->image != $choose->image) {
            $file = explode(';', $request->image);
            $file = explode('/', $file[0]);
            $file_ex = end($file);
            $file_name = \Str::random(10) . '.' . $file_ex;
            $choose->image = $file_name;

            Image::make($request->image)->save(public_path('/uploads/img/choose/').$file_name);
            // Image::make($request->image)->resize(360, 220)->save(public_path('/uploads/img/choose/').$file_name);
        }

        $choose->save();

        return response()->json('success', 200);
    }
    public function destroy(Request $request, $id)
    {
        $choose = Choose::find($id);
        // return $choose->image;
        $image = $choose->image;
        $imagePath = public_path('/uploads/img/choose/').$image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $choose->delete();
    }
}
