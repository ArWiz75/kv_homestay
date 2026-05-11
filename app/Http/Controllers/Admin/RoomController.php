<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'price_weekly' => 'nullable|numeric|min:0',
            'price_monthly' => 'nullable|numeric|min:0',
            'amenities' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('rooms', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        // Convert amenities from comma separated to array
        if (!empty($validated['amenities'])) {
            $validated['amenities'] = array_map('trim', explode(',', $validated['amenities']));
        } else {
            $validated['amenities'] = [];
        }

        $validated['is_popular'] = $request->has('is_popular');

        Room::create($validated);

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'price_weekly' => 'nullable|numeric|min:0',
            'price_monthly' => 'nullable|numeric|min:0',
            'amenities' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($room->image && str_starts_with($room->image, 'storage/')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $room->image));
            }
            $path = $request->file('image')->store('rooms', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        if (!empty($validated['amenities'])) {
            $validated['amenities'] = array_map('trim', explode(',', $validated['amenities']));
        } else {
            $validated['amenities'] = [];
        }

        $validated['is_popular'] = $request->has('is_popular');

        $room->update($validated);

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil diperbarui.');
    }

    public function destroy(Room $room)
    {
        if ($room->image && str_starts_with($room->image, 'storage/')) {
            Storage::disk('public')->delete(str_replace('storage/', '', $room->image));
        }
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil dihapus.');
    }
}
