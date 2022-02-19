<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Image;

class AboutUsController extends Controller
{

    public function index()
    {
        //
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
            'smallText' => 'required',
            'smallDescription' => 'required',
            'mainDescription' => 'required',
            // 'imageOne' => 'required|image|mimes:jpeg,bmp,png,gif,svg,pdf',
            // 'imageTwo' => 'required|image|mimes:jpeg,bmp,png,gif,svg'
        ]);

        $fileOne = explode(';', $request->imageOne);
        $fileOne = explode('/', $fileOne[0]);
        $file_one_ex = end($fileOne);

        $fileTwo = explode(';', $request->imageTwo);
        $fileTwo = explode('/', $fileTwo[0]);
        $file_two_ex = end($fileTwo);

        $file_one_name = \Str::random(10) . '.' . $file_one_ex;
        $file_two_name = \Str::random(10) . '.' . $file_two_ex;

        $product = AboutUs::create([
            'heading' => $request->heading,
            'smallText' => $request->smallText,
            'smallDescription' => $request->smallDescription,
            'mainDescription' => $request->mainDescription,
            'imageOne' => $file_one_name,
            'imageTwo' => $file_two_name,
        ]);

        Image::make($request->imageOne)->save(public_path('/uploads/img/about/').$file_one_name);
        // Image::make($request->imageOne)->resize(458, 458)->save(public_path('/uploads/products/').$file_one_name);
        
        Image::make($request->imageTwo)->save(public_path('/uploads/img/about/').$file_two_name);
        // Image::make($request->imageTwo)->resize(458, 458)->save(public_path('/uploads/products/').$file_two_name);

        return response()->json('success', 200);
        
    }

    public function show(AboutUs $aboutUs)
    {
        //
    }

    public function edit(AboutUs $aboutUs)
    {
        //
    }

    public function update(Request $request, AboutUs $aboutUs)
    {
        //
    }

    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
