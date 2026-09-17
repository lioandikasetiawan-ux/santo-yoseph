<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSchedules = Schedule::count();
        $totalAnnouncements = Announcement::count();
        $totalEvents = Event::count();
        $totalGalleries = Gallery::count();

        return view('admin.dashboard', compact('totalSchedules', 'totalAnnouncements', 'totalEvents', 'totalGalleries'));
    }
}