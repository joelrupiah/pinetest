<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Image;

class GalleryController extends Controller
{

    public function index()
    {
        $galleries = Gallery::with('grade')->get();

        return response()->json([
            'galleries' => $galleries
        ], 200);
    }

    public function getGalleries()
    {
        $galleries = Gallery::with('grade')->get();

        return response()->json([
            'galleries' => $galleries
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
            'grade_id' => 'nullable',
            'image' => 'required'
        ]);

        $file = explode(';', $request->image);
        $file = explode('/', $file[0]);
        $file_ex = end($file);

        $file_name = \Str::random(10) . '.' . $file_ex;

        Gallery::create([
            'grade_id' => $request->grade_id,
            'image' => $file_name,
        ]);

        Image::make($request->image)->resize(800, 650)->save(public_path('/uploads/img/gallery/').$file_name);

        return response()->json('success', 200);
    }

    public function show(Gallery $gallery, $id)
    {
        // return $id;
        $gallery = Gallery::where('id', $id)
                ->with('grade')
                ->first();

        return response()->json([
            'gallery' => $gallery
        ], 200);
    }

    public function edit(Gallery $gallery)
    {
        //
    }

    public function update(Request $request, Gallery $gallery)
    {
        // return $request;
        $gallery = Gallery::find($request->id);
        
        $gallery->grade_id = $request->grade_id;

        if ($request->image != $gallery->image) {
            $file = explode(';', $request->image);
            $file = explode('/', $file[0]);
            $file_ex = end($file);
            $file_name = \Str::random(10) . '.' . $file_ex;
            $gallery->image = $file_name;
            Image::make($request->image)->resize(800, 650)->save(public_path('/uploads/img/gallery/').$file_name);
        }

        $gallery->save();

        return response()->json('success', 200);
    }

    public function destroy(Gallery $gallery)
    {
        //
    }
}
