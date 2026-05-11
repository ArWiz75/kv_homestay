<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Room $room)
    {
        return view('booking.create', compact('room'));
    }

    public function store(Request $request, Room $room)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'guest_phone' => 'required|string|max:20',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $validated['room_id'] = $room->id;
        $validated['status'] = 'pending';

        Reservation::create($validated);

        return redirect()->route('welcome')->with('success', 'Pesanan Anda berhasil dikirim! Tim kami akan segera menghubungi Anda melalui WhatsApp/Email untuk konfirmasi.');
    }
}
