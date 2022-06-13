<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
// use Image;

class FeeController extends Controller
{
    
    public function index()
    {
        $feesRequests = Fee::get();

        // return $feesRequests;

        // $feesRequests = json_decode($feesRequests->grade_id);

        return response()->json([
            'feesRequests' => $feesRequests
        ], 200);
    }

    public function getFeeRequest(Fee $fee, $id)
    {
        $fee = Fee::where('id', $id)->first();

        return response()->json([
            'fee' => $fee
        ], 200);
    }

    public function create()
    {
        //
    }

    public function sendFeeEmail(Request $request, Fee $fee)
    {
        // return $request;
        $fee = Fee::find($request->id);

        $fee->email = $request->email;
        $fee->grade_id = $request->grade_id;

        // $file = $request->littlePinesPdf;

        // if($request->hasFile($request->littlePinesPdf) == '')
        // {
        //     return response()->json('check', 500);
        // }

        if($request->hasFile($request->littlePinesPdf)){

            $file_one = explode(';', $request->littlePinesPdf);
            $file_one = explode('/', $file_one[0]);
            $file_one_ex = end($file_one);
            $file_one_name = \Str::random(10) . '.' . $file_one_ex;
            $fee->little_pines = $file_one_name;

            

            // $file = $request->file($request->littlePinesPdf);                
            // $ext = $file->getClientOriginalExtension();
            // $newName = rand(100000,1001238912).".".$ext;
            // $base64 = base64_encode($file);
            // // $file->move('/uploads/fees/', $base64);
            // $file->move(public_path("/uploads/fees/").$base64);
            // $request->littlePinesPdf = $base64; 
            // $fee->little_pines = $base64;

        }

        $fee->update();

            return response()->json('success', 200);

        
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        // $grade = json_encode($request->checked);
        // $grade = implode(',', $request->checked);

        // return $grade;

        $requestedFees = Fee::create([
            'email' => $request->email,
            'grade_id' => $request->checked
        ]);

        $requestedFees->save();

        return response()->json('Request complete', 200);
    }

    public function show(Fee $fee)
    {
        //
    }

    public function edit(Fee $fee)
    {
        //
    }

    public function update(Request $request, Fee $fee)
    {
        //
    }

    public function destroy(Fee $fee)
    {
        //
    }
}
