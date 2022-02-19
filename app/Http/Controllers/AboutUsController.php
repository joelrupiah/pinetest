<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

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
        // return $request;
        $request->validate([
            'heading' => 'required',
            'smallText' => 'required',
            'smallDescription' => 'required',
            'mainDescription' => 'required',
            'imageOne' => 'required|image|mimes:jpeg,bmp,png,gif,svg,pdf',
            'imageTwo' => 'required|image|mimes:jpeg,bmp,png,gif,svg'
        ]);
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
