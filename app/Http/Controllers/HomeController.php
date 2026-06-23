<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        $rooms = Room::all();
        $settings = Setting::all()->pluck('value', 'key');
        
        return view('welcome', compact('rooms', 'settings'));
    }

    /**
     * Show the compact modern landing page.
     */
    public function landing()
    {
        $rooms = Room::all();
        $settings = Setting::all()->pluck('value', 'key');

        return view('landing', compact('rooms', 'settings'));
    }
}
