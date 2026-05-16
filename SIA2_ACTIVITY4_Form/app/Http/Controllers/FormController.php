<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class FormController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function index()
    {
    $bookings = \App\Models\Booking::all();
    return view('bookings', compact('bookings'));
    }
    
    public function store(Request $request)
    {
        // ✅ VALIDATION
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'age' => 'required|numeric|min:18',
            'event_type' => 'required|in:birthday,seminar,wedding',
            'special_request' => 'nullable|min:5',
            'event_date' => 'required|date|after:today',
        ], [
            // ✅ CUSTOM MESSAGES ONLY HERE
            'event_date.after' => 'Please choose a future date.',
            'special_request' => 'Please enter your request.',
            'age.min' => 'You must be at least 18 years old.',
            'email.email' => 'Invalid email format!'
        ]);
        // ✅ MOVE IT HERE (AFTER VALIDATION)
        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'event_type' => $request->event_type,
            'event_date' => $request->event_date,
            'special_request' => $request->special_request,
        ]);
        
        // ✅ REDIRECT
        return redirect('/bookings')->with('success', 'Event booked successfully!');
    }
}