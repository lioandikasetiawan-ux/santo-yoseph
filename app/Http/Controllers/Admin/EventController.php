<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        }

        Event::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'event_date' => $request->event_date,
            'location' => $request->location,
            'description' => $request->description,
            'banner_image' => $imagePath, // Sesuaikan ke banner_image
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Agenda kegiatan berhasil ditambahkan!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $event->banner_image; // Sesuaikan ke banner_image
        if ($request->hasFile('image')) {
            if ($event->banner_image) {
                Storage::disk('public')->delete($event->banner_image);
            }
            $imagePath = $request->file('image')->store('events', 'public');
        }

        $event->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'event_date' => $request->event_date,
            'location' => $request->location,
            'description' => $request->description,
            'banner_image' => $imagePath, // Sesuaikan ke banner_image
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Agenda kegiatan berhasil diperbarui!');
    }

    public function destroy(Event $event)
    {
        if ($event->banner_image) {
            Storage::disk('public')->delete($event->banner_image);
        }
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Agenda kegiatan berhasil dihapus!');
    }
}