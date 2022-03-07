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
            'headerOne' => 'required',
            'headerTwo' => 'required',
            'headerThree' => 'required',
            'headerFour' => 'required',
            'descriptionOne' => 'required',
            'descriptionTwo' => 'required',
            'descriptionThree' => 'required',
            'descriptionFour' => 'required',
            'descriptionFive' => 'required',
            'video' => 'required',
            // 'imageOne' => 'required|image|mimes:jpeg,bmp,png,gif,svg,pdf',
            // 'imageTwo' => 'required|image|mimes:jpeg,bmp,png,gif,svg'
        ]);

        $file = explode(';', $request->image);
        $file = explode('/', $file[0]);
        $file_ex = end($file);

        $file_name = \Str::random(10) . '.' . $file_ex;

        $about = AboutUs::create([
            'heading' => $request->heading,
            'description' => $request->description,
            'headerOne' => $request->headerOne,
            'headerTwo' => $request->headerTwo,
            'headerThree' => $request->headerThree,
            'headerFour' => $request->headerFour,
            'descriptionOne' => $request->descriptionOne,
            'descriptionTwo' => $request->descriptionTwo,
            'descriptionThree' => $request->descriptionThree,
            'descriptionFour' => $request->descriptionFour,
            'descriptionFive' => $request->descriptionFive,
            'image' => $file_name,
            'video' => $request->video
        ]);

        Image::make($request->image)->resize(470, 545)->save(public_path('/uploads/img/about/').$file_name);
        
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
        $about->headerOne = $request->headerOne;
        $about->headerTwo = $request->headerTwo;
        $about->headerThree = $request->headerThree;
        $about->headerFour = $request->headerFour;
        $about->descriptionOne = $request->descriptionOne;
        $about->descriptionTwo = $request->descriptionTwo;
        $about->descriptionThree = $request->descriptionThree;
        $about->descriptionFour = $request->descriptionFour;
        $about->descriptionFive = $request->descriptionFive;
        $about->video = $request->video;

        if ($request->image != $about->image) {
            $file = explode(';', $request->image);
            $file = explode('/', $file[0]);
            $file_ex = end($file);
            $file_name = \Str::random(10) . '.' . $file_ex;
            $about->image = $file_name;

            Image::make($request->image)->resize(470, 545)->save(public_path('/uploads/img/about/').$file_name);

        }

        $about->save();

        return response()->json('success', 200);

    }

    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
