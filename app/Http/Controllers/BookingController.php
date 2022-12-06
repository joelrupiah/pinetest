<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\BookingMail;
use App\Mail\BookingResponse;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'DESC')->get();

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
          'ages' => 'required',
          'address' => 'required',
          'heard' => 'nullable',
          'other' => 'nullable'
        ]);

        $booking = Booking::create([
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'date' => $request->date,
          'ages' => $request->ages,
          'address' => $request->address,
          'heard' => $request->heard,
          'other' => $request->other,
        ]);

        $userData = [
          'title' => 'Pinecrest Academy',
          'body' => 'A booking was sent to the website from ' . $request->name . ' of email ' . $request->email . '. Please login to the administrator page to check the booking.'
        ];

        \Mail::to(env('MAIL_USERNAME'))->send(new BookingMail($userData));

        return response()->json('success', 201);
    }

    public function show(Booking $booking, $id)
    {
        $booking = Booking::where('id', $id)->first();

        return response()->json([
          'booking' => $booking
        ], 200);
    }

    public function update(Request $request, Booking $booking, $id)
    {
      $booking = Booking::find($request->id);
      $booking->time = $request->time;
      $booking->status = implode(",",  $request['status']);
      $booking->update();

      // return $booking;

      $bookingDate = date('d-m-Y', strtotime($booking->date));
      // return $bookingDate;

      $data = [
        'title' => 'Pinecrest Academy',
        'body' => 'Thank you ' . $booking->name . ' for booking a tour of Pinecrest Academy.
                    The application was successful and you are invited to the school for the specified date ' 
                    . $bookingDate . ' at ' . $booking->time .  'hrs. WELCOME.'
      ];

      if($booking->status === '2'){
        \Mail::to($booking->email)->send(new BookingResponse($data));
      }

      // return $booking;

      return response()->json('success', 200);
    }

    public function destroy(Booking $booking, $id)
    {
        $booking = Booking::find($booking);

        $booking->delete();
    }
}
