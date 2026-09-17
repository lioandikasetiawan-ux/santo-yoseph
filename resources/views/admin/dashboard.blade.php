@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-2xl shadow-sm border border-blue-100/60 relative overflow-hidden">
        <div class="absolute right-0 top-0 bottom-0 w-1/3 bg-gradient-to-l from-blue-50/60 to-transparent pointer-events-none"></div>
        <div>
            <span class="inline-block text-[11px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full mb-2">Admin Portal</span>
            <h1 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight">Dashboard Overview</h1>
            <p class="text-xs md:text-sm text-slate-500 mt-1">Sistem Pengelolaan Informasi Paroki Santo Yoseph Sidareja</p>
        </div>
        <div class="flex items-center gap-3 bg-slate-50 border border-slate-200/60 px-4 py-2.5 rounded-xl self-start sm:self-auto shadow-sm">
            <div class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm shadow-md shadow-blue-500/20">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
                <p class="text-[10px] uppercase tracking-wider font-semibold text-slate-400">Masuk Sebagai</p>
                <p class="text-xs font-bold text-slate-800">{{ Auth::user()->name }}</p>
            </div>
        </div>
    </div>

    <!-- Stats Grid Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Card 1: Jadwal Misa -->
        <div class="group bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:border-blue-300 hover:shadow-xl hover:shadow-blue-500/5 transition-all duration-300 relative overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500 z-0"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400 group-hover:text-blue-600 transition-colors">Jadwal Misa</p>
                    <p class="text-3xl font-black text-slate-800 mt-2">{{ $totalSchedules }}</p>
                </div>
                <div class="p-3.5 bg-blue-50 text-blue-600 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-colors shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="relative z-10 mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                <span class="text-slate-500 font-medium">Data aktif paroki</span>
                <a href="{{ route('admin.schedules.index') }}" class="font-bold text-blue-600 hover:text-blue-700 hover:underline flex items-center gap-1">Kelola &rarr;</a>
            </div>
        </div>

        <!-- Card 2: Pengumuman -->
        <div class="group bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:border-blue-300 hover:shadow-xl hover:shadow-blue-500/5 transition-all duration-300 relative overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-indigo-50 rounded-full group-hover:scale-150 transition-transform duration-500 z-0"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400 group-hover:text-indigo-600 transition-colors">Pengumuman</p>
                    <p class="text-3xl font-black text-slate-800 mt-2">{{ $totalAnnouncements }}</p>
                </div>
                <div class="p-3.5 bg-indigo-50 text-indigo-600 rounded-2xl group-hover:bg-indigo-600 group-hover:text-white transition-colors shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 58h2m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="relative z-10 mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                <span class="text-slate-500 font-medium">Informasi umat</span>
                <a href="{{ route('admin.announcements.index') }}" class="font-bold text-indigo-600 hover:text-indigo-700 hover:underline flex items-center gap-1">Kelola &rarr;</a>
            </div>
        </div>

        <!-- Card 3: Agenda Kegiatan -->
        <div class="group bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:border-blue-300 hover:shadow-xl hover:shadow-blue-500/5 transition-all duration-300 relative overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-150 transition-transform duration-500 z-0"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400 group-hover:text-amber-600 transition-colors">Agenda Kegiatan</p>
                    <p class="text-3xl font-black text-slate-800 mt-2">{{ $totalEvents }}</p>
                </div>
                <div class="p-3.5 bg-amber-50 text-amber-600 rounded-2xl group-hover:bg-amber-600 group-hover:text-white transition-colors shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10z"/></svg>
                </div>
            </div>
            <div class="relative z-10 mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                <span class="text-slate-500 font-medium">Kalender paroki</span>
                <a href="{{ route('admin.events.index') }}" class="font-bold text-amber-600 hover:text-amber-700 hover:underline flex items-center gap-1">Kelola &rarr;</a>
            </div>
        </div>

        <!-- Card 4: Foto Galeri -->
        <div class="group bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:border-blue-300 hover:shadow-xl hover:shadow-blue-500/5 transition-all duration-300 relative overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500 z-0"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400 group-hover:text-emerald-600 transition-colors">Foto Galeri</p>
                    <p class="text-3xl font-black text-slate-800 mt-2">{{ $totalGalleries }}</p>
                </div>
                <div class="p-3.5 bg-emerald-50 text-emerald-600 rounded-2xl group-hover:bg-emerald-600 group-hover:text-white transition-colors shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="relative z-10 mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                <span class="text-slate-500 font-medium">Dokumentasi</span>
                <a href="{{ route('admin.galleries.index') }}" class="font-bold text-emerald-600 hover:text-emerald-700 hover:underline flex items-center gap-1">Kelola &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Quick Info / Welcome Banner Section -->
    <div class="bg-gradient-to-r from-blue-900 to-blue-950 rounded-2xl p-6 md:p-8 text-white shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="space-y-2 text-center md:text-left">
            <span class="bg-blue-800/80 text-blue-200 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider border border-blue-700/50">Sistem Informasi Paroki</span>
            <h2 class="text-xl md:text-2xl font-bold font-serif">Selamat Datang di Panel Administrator</h2>
            <p class="text-blue-200 text-xs md:text-sm max-w-xl font-light">Gunakan panel navigasi di sebelah kiri atau tombol "Kelola" di atas untuk mengatur jadwal peribadatan, warta paroki, agenda kegiatan, serta dokumentasi galeri foto umat.</p>
        </div>
        <div class="flex shrink-0 gap-3">
            <a href="{{ route('public.home') }}" target="_blank" class="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white rounded-xl text-xs font-bold transition border border-white/15 backdrop-blur-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                Lihat Web Publik
            </a>
        </div>
    </div>
</div>
@endsection