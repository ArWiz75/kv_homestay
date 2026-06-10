<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        $totalRooms = Room::count();
        $popularRooms = Room::where('is_popular', true)->count();
        $availableRooms = Room::where('is_available', true)->count();

        return view('dashboard', compact('totalRooms', 'popularRooms', 'availableRooms'));
    }
}
