<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Image;

class GalleryController extends Controller
{

    public function index(Request $request)
    {
        $galleries = Gallery::with('category')->paginate($request->total);

        return response()->json([
            'galleries' => $galleries
        ], 200);
    }

    public function getAllGalleries()
    {
        $allgalleries = Gallery::get()->take(6);

        return response()->json([
            'allgalleries' => $allgalleries
        ], 200);
    }

    public function getGalleries(Request $request)
    {
        $galleries = Gallery::with('category')->paginate($request->total);

        return response()->json([
            'galleries' => $galleries
        ], 200);
    }

    public function educationGalleries(Request $request)
    {
        $educationGalleries = Gallery::with('category')->where('category_id', 1)->paginate($request->total);

        return response()->json([
            'educationGalleries' => $educationGalleries
        ], 200);
    }

    public function getSportGallery(Request $request)
    {
        $sportGalleries = Gallery::with('category')->where('category_id', 2)->paginate($request->total);

        return response()->json([
            'sportGalleries' => $sportGalleries
        ], 200);
    }

    public function getAgricultureGallery(Request $request)
    {
        $agricultureGalleries = Gallery::with('category')->where('category_id', 3)->paginate($request->total);

        return response()->json([
            'agricultureGalleries' => $agricultureGalleries
        ], 200);
    }

    public function getSocialEventsGallery(Request $request)
    {
        $socialeventsGalleries = Gallery::with('category')->where('category_id', 4)->paginate($request->total);

        return response()->json([
            'socialeventsGalleries' => $socialeventsGalleries
        ], 200);
    }

    public function getInfrastructureGallery(Request $request)
    {
        $infrastructureGalleries = Gallery::with('category')->where('category_id', 5)->paginate($request->total);

        return response()->json([
            'infrastructureGalleries' => $infrastructureGalleries
        ], 200);
    }

    public function create()
    {
        //creating data
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'category_id' => 'nullable',
            'image' => 'required',
            'description' => 'required'
        ]);

        $file = explode(';', $request->image);
        $file = explode('/', $file[0]);
        $file_ex = end($file);

        $file_name = \Str::random(10) . '.' . $file_ex;

        Gallery::create([
            'category_id' => $request->category_id,
            'image' => $file_name,
            'description' => $request->description
        ]);

        Image::make($request->image)->save(public_path('/uploads/img/gallery/').$file_name);
        // Image::make($request->image)->resize(800, 650)->save(public_path('/uploads/img/gallery/').$file_name);

        return response()->json('success', 200);
    }

    public function show(Gallery $gallery, $id)
    {
        // return $id;
        $gallery = Gallery::where('id', $id)
                ->with('category')
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

        $mainImage = $gallery->image;
        
        $gallery->category_id = $request->category_id;
        $gallery->description = $request->description;

        $imagePath = public_path('/uploads/img/gallery/').$mainImage;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        if ($request->image != $gallery->image) {
            $file = explode(';', $request->image);
            $file = explode('/', $file[0]);
            $file_ex = end($file);
            $file_name = \Str::random(10) . '.' . $file_ex;
            $gallery->image = $file_name;
            Image::make($request->image)->save(public_path('/uploads/img/gallery/').$file_name);
            // Image::make($request->image)->resize(800, 650)->save(public_path('/uploads/img/gallery/').$file_name);
        }

        $gallery->save();

        return response()->json('success', 200);
    }

    public function destroy(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        // return $gallery->image;
        $image = $gallery->image;
        $imagePath = public_path('/uploads/img/gallery/').$image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $gallery->delete();
    }
}
