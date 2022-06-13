<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Image;

class AboutUsController extends Controller
{

    public function index(Request $request)
    {
        $abouts = AboutUs::paginate($request->total);

        return response()->json([
            'abouts' => $abouts
        ], 200);
    }

    public function getUserAbout()
    {
        $abouts = AboutUs::get();

        return response()->json([
            'abouts' => $abouts
        ], 200);
    }

    public function searchAbouts(Request $request)
    {
        $abouts = AboutUs::where('heading', 'LIKE','%'.$request->search.'%')
                    ->paginate($request->total);

        return response()->json([
            'abouts' => $abouts
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);
        // return $request;
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'video' => 'required',
            // 'imageOne' => 'required|image|mimes:jpeg,bmp,png,gif,svg,pdf',
            // 'imageTwo' => 'required|image|mimes:jpeg,bmp,png,gif,svg'
        ]);

        $file_one = explode(';', $request->imageOne);
        $file_one = explode('/', $file_one[0]);
        $file_one_ex = end($file_one);

        $file_one_name = \Str::random(10) . '.' . $file_one_ex;

        $file_two = explode(';', $request->imageTwo);
        $file_two = explode('/', $file_two[0]);
        $file_two_ex = end($file_two);

        $file_two_name = \Str::random(10) . '.' . $file_two_ex;

        $about = AboutUs::create([
            'heading' => $request->heading,
            'description' => $request->description,
            'imageOne' => $file_one_name,
            'imageTwo' => $file_two_name,
            'video' => $request->video
        ]);

        Image::make($request->imageOne)->save(public_path('/uploads/img/about/').$file_one_name);
        // Image::make($request->imageOne)->resize(945, 620)->save(public_path('/uploads/img/about/').$file_one_name);
        Image::make($request->imageTwo)->save(public_path('/uploads/img/about/').$file_two_name);
        // Image::make($request->imageTwo)->resize(457, 300)->save(public_path('/uploads/img/about/').$file_two_name);
        
        return response()->json('success', 200);
        
    }

    public function show(AboutUs $aboutUs, $id)
    {
        // return $id;
        $about = AboutUs::findOrFail($id);
        // return $about;
        return response()->json([
            'about' => $about
        ], 200);
    }

    public function edit(AboutUs $aboutUs)
    {
        //
    }

    public function update(Request $request, AboutUs $aboutUs)
    {
        // return $request;
        $about = AboutUs::find($request->id);

        $about->heading = $request->heading;
        $about->description = $request->description;
        $about->video = $request->video;

        if ($request->imageOne != $about->imageOne) {
            $file_one = explode(';', $request->imageOne);
            $file_one = explode('/', $file_one[0]);
            $file_one_ex = end($file_one);
            $file_one_name = \Str::random(10) . '.' . $file_one_ex;
            $about->imageOne = $file_one_name;

            Image::make($request->imageOne)->save(public_path('/uploads/img/about/').$file_one_name);
            // Image::make($request->imageOne)->resize(945, 620)->save(public_path('/uploads/img/about/').$file_one_name);

        }

        if ($request->imageTwo != $about->imageTwo) {
            $file_two = explode(';', $request->imageTwo);
            $file_two = explode('/', $file_two[0]);
            $file_two_ex = end($file_two);
            $file_two_name = \Str::random(10) . '.' . $file_two_ex;
            $about->imageTwo = $file_two_name;

            Image::make($request->imageTwo)->save(public_path('/uploads/img/about/').$file_two_name);
            // Image::make($request->imageTwo)->resize(457, 300)->save(public_path('/uploads/img/about/').$file_two_name);

        }

        $about->save();

        return response()->json('success', 200);

    }

    public function destroy(Request $request, $id)
    {
        $aboutUs = AboutUs::find($id);

        // return $aboutUs->imageTwo;
        $imageOne = $aboutUs->imageOne;
        $imagePathOne = public_path('/uploads/img/about/').$imageOne;

        $imageTwo = $aboutUs->imageTwo;
        $imagePathTwo = public_path('/uploads/img/about/').$imageTwo;

        if (file_exists($imagePathOne)) {
            unlink($imagePathOne);
        }

        if (file_exists($imagePathTwo)) {
            unlink($imagePathTwo);
        }

        $aboutUs->delete();
    }
}
