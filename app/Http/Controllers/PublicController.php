<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\ParishProfile;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $schedules = Schedule::where('is_active', true)->orderBy('schedule_time', 'asc')->take(5)->get();
        $announcements = Announcement::orderBy('created_at', 'desc')->take(4)->get();
        $events = Event::orderBy('event_date', 'asc')->where('event_date', '>=', now())->take(3)->get();
        $galleries = Gallery::orderBy('created_at', 'desc')->take(6)->get();
        $profile = ParishProfile::first();

        return view('public.home', compact('schedules', 'announcements', 'events', 'galleries', 'profile'));
    }

    public function schedules()
    {
        $schedules = Schedule::where('is_active', true)->orderBy('schedule_time', 'asc')->get();
        return view('public.schedules', compact('schedules'));
    }

    public function announcements()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(6);
        return view('public.announcements', compact('announcements'));
    }

    public function announcementDetail($slug)
    {
        $announcement = Announcement::where('slug', $slug)->firstOrFail();
        return view('public.announcement-detail', compact('announcement'));
    }

    public function events()
    {
        $events = Event::orderBy('event_date', 'asc')->paginate(6);
        return view('public.events', compact('events'));
    }

    public function eventDetail($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('public.event-detail', compact('event'));
    }

    public function galleries()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(12);
        return view('public.galleries', compact('galleries'));
    }
}