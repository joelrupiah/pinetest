<?php

namespace App\Http\Controllers;

use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
  
    public function index()
    {
        $sitesettings = ContactSetting::get();

        return response()->json([
            'sitesettings' => $sitesettings
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
            'site_email' => 'required',
            'site_phone' => 'required',
            'site_town' => 'required',
            'site_address' => 'required',
            'opening_time' => 'required',
            'closing_time' => 'required'
        ]);

        ContactSetting::create([
            'email' => $request->site_email,
            'phone' => $request->site_phone,
            'town' => $request->site_town,
            'address' => $request->site_address,
            'opening_time' => $request->opening_time,
            'closing_time' => $request->closing_time
        ]);

        return response()->json('success', 200);
    }

    public function show(ContactSetting $contactSetting, $id)
    {
        
        $sitesetting = ContactSetting::where('id', $id)->first();

        return response()->json([
            'sitesetting' => $sitesetting
        ], 200);
    }

    public function edit(SiteSetting $siteSetting)
    {
        //
    }

    public function update(Request $request, ContactSetting $contactSetting)
    {
        $contactSetting = ContactSetting::find($request->id);

        $contactSetting->email = $request->site_email;
        $contactSetting->phone = $request->site_phone;
        $contactSetting->town = $request->site_town;
        $contactSetting->address = $request->site_address;
        $contactSetting->opening_time = $request->opening_time;
        $contactSetting->closing_time = $request->closing_time;

        $contactSetting->save();

        return response()->json('success', 200);
    }

    public function destroy(ContactSetting $contactSetting)
    {
        //
    }
}
