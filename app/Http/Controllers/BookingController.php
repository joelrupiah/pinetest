<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::get();

        return response()->json([
          'bookings' => $bookings
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'date' => 'required',
          'address' => 'required',
          'heard' => 'required'
        ]);

        $booking = Booking::create([
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'date' => $request->date,
          'address' => $request->address,
          'heard' => $request->heard,
        ]);

        $booking->save();

        return response()->json('success', 201);
    }

    public function show(Booking $booking, $id)
    {
        $booking = Booking::find($id);

        return response()->json([
          'booking' => $booking
        ], 200);
    }

    public function update(Request $request, Booking $booking, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->address = $request->address;
        $booking->heard = $request->heard;

        $booking->save();

        return response()->json('success', 200);
    }

    public function destroy(Booking $booking, $id)
    {
        $booking = Booking::find($booking);

        $booking->delete();
    }
}
