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
            'headingOne' => 'required',
            'headingTwo' => 'required',
            'headingThree' => 'required',
            'headingFour' => 'required',
            'headingFive' => 'required',
            'headingSix' => 'required',
            'headingSeven' => 'required',
            'descriptionOne' => 'required',
            'descriptionTwo' => 'required',
            'descriptionThree' => 'required',
            'descriptionFour' => 'required',
            'descriptionFive' => 'required',
            'descriptionSix' => 'required',
            'descriptionSeven' => 'required',
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
            'headingOne' => $request->headingOne,
            'headingTwo' => $request->headingTwo,
            'headingThree' => $request->headingThree,
            'headingFour' => $request->headingFour,
            'headingFive' => $request->headingFive,
            'headingSix' => $request->headingSix,
            'headingSeven' => $request->headingSeven,
            'descriptionOne' => $request->descriptionOne,
            'descriptionTwo' => $request->descriptionTwo,
            'descriptionThree' => $request->descriptionThree,
            'descriptionFour' => $request->descriptionFour,
            'descriptionFive' => $request->descriptionFive,
            'descriptionSix' => $request->descriptionSix,
            'descriptionSeven' => $request->descriptionSeven,
            'imageOne' => $file_one_name,
            'imageTwo' => $file_two_name,
            'video' => $request->video
        ]);

        Image::make($request->imageOne)->resize(945, 620)->save(public_path('/uploads/img/about/').$file_one_name);
        Image::make($request->imageTwo)->resize(457, 300)->save(public_path('/uploads/img/about/').$file_two_name);
        
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
        $about->headingOne = $request->headingOne;
        $about->headingTwo = $request->headingTwo;
        $about->headingThree = $request->headingThree;
        $about->headingFour = $request->headingFour;
        $about->headingFive = $request->headingFive;
        $about->headingSix = $request->headingSix;
        $about->headingSeven = $request->headingSeven;
        $about->descriptionOne = $request->descriptionOne;
        $about->descriptionTwo = $request->descriptionTwo;
        $about->descriptionThree = $request->descriptionThree;
        $about->descriptionFour = $request->descriptionFour;
        $about->descriptionFive = $request->descriptionFive;
        $about->descriptionSix = $request->descriptionSix;
        $about->descriptionSeven = $request->descriptionSeven;
        $about->video = $request->video;

        if ($request->imageOne != $about->imageOne) {
            $file_one = explode(';', $request->imageOne);
            $file_one = explode('/', $file_one[0]);
            $file_one_ex = end($file_one);
            $file_one_name = \Str::random(10) . '.' . $file_one_ex;
            $about->imageOne = $file_one_name;

            Image::make($request->imageOne)->resize(945, 620)->save(public_path('/uploads/img/about/').$file_one_name);

        }

        if ($request->imageTwo != $about->imageTwo) {
            $file_two = explode(';', $request->imageTwo);
            $file_two = explode('/', $file_two[0]);
            $file_two_ex = end($file_two);
            $file_two_name = \Str::random(10) . '.' . $file_two_ex;
            $about->imageTwo = $file_two_name;

            Image::make($request->imageTwo)->resize(457, 300)->save(public_path('/uploads/img/about/').$file_two_name);

        }

        $about->save();

        return response()->json('success', 200);

    }

    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
