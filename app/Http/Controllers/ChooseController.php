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

        Image::make($request->image)->resize(360, 220)->save('uploads/img/choose/' .$file_name);

        return response()->json('success', 200);

    }
    public function update(Request $request, Choose $choose)
    {
        $choose = Choose::find($request->id);

        $choose->title = $request->title;
        $choose->description = $request->description;

        if ($request->image != $choose->image) {
            $file = explode(';', $request->image);
            $file = explode('/', $file[0]);
            $file_ex = end($file);
            $file_name = \Str::random(10) . '.' . $file_ex;
            $choose->image = $file_name;

            Image::make($request->image)->resize(360, 220)->save('uploads/img/choose/' .$file_name);
        }

        $choose->save();

        return response()->json('success', 200);
    }
    public function destroy(Request $request, $id)
    {

    }
    
}
