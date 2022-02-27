<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Image;

class CarouselController extends Controller
{
   
    public function index()
    {
        $carousels = Carousel::get();

        return response()->json([
            'carousels' => $carousels
        ], 200);
    }

    public function getUserCarousel()
    {
        $carousels = Carousel::get();

        return response()->json([
            'carousels' => $carousels
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $file = explode(';', $request->image);
        $file = explode('/', $file[0]);
        $file_ex = end($file);

        $file_name = \Str::random(10) . '.' . $file_ex;

        $event = Carousel::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $file_name
        ]);

        Image::make($request->image)->resize(2000, 1125)->save(public_path('/uploads/img/carousel/').$file_name);

        return response()->json('success', 200);
    }

    public function show(Carousel $carousel)
    {
        //
    }

    public function edit(Carousel $carousel)
    {
        //
    }

    public function update(Request $request, Carousel $carousel)
    {
        $carousel = Carousel::find($request->id);
        
        $event->title = $request->title;
        $event->description = $request->description;

        if ($request->image != $event->image) {
            $file = explode(';', $request->image);
            $file = explode('/', $file[0]);
            $file_ex = end($file);
            $file_name = \Str::random(10) . '.' . $file_ex;
            $event->image = $file_name;
            Image::make($request->image)->resize(2000, 1125)->save(public_path('/uploads/img/carousel/').$file_name);
        }

        $event->save();

        return response()->json('success', 200);
    }

    public function destroy(Carousel $carousel)
    {
        //
    }
}
