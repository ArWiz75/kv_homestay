<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('room')->latest()->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $reservation->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Status reservasi berhasil diperbarui.');
    }
}
