<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Resources\EventResource;
use Image;

class EventController extends Controller
{
    
    public function index()
    {
        // return EventResource::collection(Event::all());
        $events = Event::get();
        
        return response()->json([
            'events' => $events
        ], 200);

    }

    public function userEvents()
    {
        $events = Event::get();
        
        return response()->json([
            'events' => $events
        ], 200);
    }

    public function eventDetails($eventSlug)
    {
        // return $eventSlug;

        $eventdetail = Event::where('slug', $eventSlug)->first();

        return response()->json([
            'eventdetail' => $eventdetail
        ], 200);
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'description' => 'required',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'eventDescription' => 'nullable',
            'host' => 'nullable',
            'location' => 'nullable',
            'street' => 'nullable',
            'city' => 'nullable',
        ]);
        
        $file = explode(';', $request->image);
        $file = explode('/', $file[0]);
        $file_ex = end($file);

        $file_name = \Str::random(10) . '.' . $file_ex;

        $slug = slugify($request->title);

        $event = Event::create([
            'title' => $request->title,
            'slug' => $slug,
            'image' => $file_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'eventDescription' => $request->eventDescription,
            'host' => $request->host,
            'location' => $request->location,
            'street' => $request->street,
            'city' => $request->city
        ]);

        Image::make($request->image)->save(public_path('/uploads/img/event/').$file_name);

        return response()->json('success', 200);
    }

    public function show(Event $event, $id)
    {
        $event = Event::where('id', $id)->first();

        return response()->json([
            'event' => $event
        ], 200);
    }

    public function edit(Event $event)
    {

    }

    public function update(Request $request, Event $event, $id)
    {
        $event = Event::find($request->id);
        
        $event->title = $request->title;
        $event->slug = slugify($request->title);
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->description = $request->description;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->eventDescription = $request->eventDescription;
        $event->host = $request->host;
        $event->location = $request->location;
        $event->street = $request->street;
        $event->city = $request->city;

        if ($request->image != $event->image) {
            $file = explode(';', $request->image);
            $file = explode('/', $file[0]);
            $file_ex = end($file);
            $file_name = \Str::random(10) . '.' . $file_ex;
            $event->image = $file_name;
            Image::make($request->image)->save(public_path('/uploads/img/event/').$file_name);
        }

        $event->save();

        return response()->json('success', 200);

    }

    public function destroy(Request $request, $id)
    {
        $event = Event::find($id);
        // return $gallery->image;
        $image = $event->image;
        $imagePath = public_path('/uploads/img/event/').$image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $event->delete();
    }
}
