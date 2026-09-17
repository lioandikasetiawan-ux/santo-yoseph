@extends('layouts.public')

@section('title', 'Jadwal Misa - Website Paroki')

@section('content')
<!-- Hero Section -->
<div class="bg-blue-900 text-white py-10 mb-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-3xl font-extrabold mb-2">Jadwal Perayaan Ekaristi / Misa</h1>
        <p class="text-blue-100 text-sm">Informasi lengkap jadwal peribadatan dan perayaan misa paroki.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 mb-12">
    <!-- Grid Layout 2 Card Utama Bersampingan -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">

        <!-- CARD 1: Jadwal Misa Rutin (Tetap) -->
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col justify-between">
            <div>
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-4 pb-2 border-b border-gray-100">
                    <span>📅</span> Jadwal Misa Rutin (Tetap)
                </h2>

                <div class="space-y-4">
                    <!-- Misa Harian Pagi -->
                    <div class="p-4 bg-gray-50/80 rounded-lg flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-semibold bg-blue-100 text-blue-700 px-2.5 py-1 rounded uppercase tracking-wide">
                                Senin - Jumat
                            </span>
                            <h3 class="font-bold text-sm text-gray-800 mt-2">Misa Harian Pagi</h3>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold text-blue-900">⏰ 06.00 WIB</p>
                            <p class="text-xs text-gray-500 mt-0.5">📍 Aula Gereja Paroki Santo Yoseph Sidareja</p>
                        </div>
                    </div>

                    <!-- Misa Sabtu Sore -->
                    <div class="p-4 bg-gray-50/80 rounded-lg flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-semibold bg-indigo-100 text-indigo-700 px-2.5 py-1 rounded uppercase tracking-wide">
                                Sabtu Sore
                            </span>
                            <h3 class="font-bold text-sm text-gray-800 mt-2">Misa Mingguan (Vigili)</h3>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold text-indigo-900">⏰ 18.00 WIB</p>
                            <p class="text-xs text-gray-500 mt-0.5">📍 Aula Gereja Paroki Santo Yoseph Sidareja</p>
                        </div>
                    </div>

                    <!-- Misa Minggu Pagi -->
                    <div class="p-4 bg-gray-50/80 rounded-lg flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-semibold bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded uppercase tracking-wide">
                                Minggu Pagi
                            </span>
                            <h3 class="font-bold text-sm text-gray-800 mt-2">Misa Mingguan</h3>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold text-emerald-900">⏰ 07.00 WIB</p>
                            <p class="text-xs text-gray-500 mt-0.5">📍 Aula Gereja Paroki Santo Yoseph Sidareja</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 2: Jadwal Misa Khusus / Hari Raya -->
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col justify-between">
            <div>
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-4 pb-2 border-b border-gray-100">
                    <span>✨</span> Jadwal Misa Khusus / Hari Raya
                </h2>

                <div class="space-y-4">
                    @forelse($schedules as $item)
                    @php
                        $dt = \Carbon\Carbon::parse($item->schedule_time);
                    @endphp
                    <div class="p-4 bg-gray-50/80 rounded-lg flex flex-col justify-between gap-2">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-semibold bg-amber-100 text-amber-800 px-2.5 py-1 rounded uppercase tracking-wide">
                                    {{ $dt->translatedFormat('l, d M Y') }}
                                </span>
                                <h3 class="font-bold text-sm text-gray-800 mt-2">{{ $item->title }}</h3>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-bold text-amber-900">⏰ {{ $dt->format('H:i') }} WIB</p>
                                <p class="text-xs text-gray-500 mt-0.5">📍 {{ $item->location }}</p>
                            </div>
                        </div>

                        @if($item->description)
                        <div class="pt-2 border-t border-gray-200/60 mt-1">
                            <p class="text-xs text-gray-500 italic">{{ $item->description }}</p>
                        </div>
                        @endif
                    </div>
                    @empty
                    <div class="py-12 text-center text-sm text-gray-400">
                        Belum ada jadwal misa khusus mendatang.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Footer --}}
<footer class="bg-blue-950 text-gray-200 py-8 md:py-12 mt-16 md:mt-20 border-t border-blue-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-10 grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
        {{-- Logo dan Nama Paroki di Footer --}}
        <div class="flex flex-col items-center sm:items-start text-center sm:text-left col-span-2 sm:col-span-1">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo Paroki" class="h-14 w-14 sm:h-20 sm:w-20 mb-3 rounded-full border-2 border-gray-400 object-cover shadow-lg">
            <h2 class="text-sm sm:text-lg font-semibold text-gray-50 tracking-wider">PAROKI SANTO YOSEPH</h2>
            <h2 class="text-sm sm:text-lg font-semibold text-gray-50 tracking-wider">SIDAREJA</h2>
        </div>

        {{-- Kontak Kami --}}
        <div class="col-span-2 sm:col-span-1">
            <h4 class="text-sm sm:text-lg font-semibold mb-3 text-gray-50 border-b border-blue-900 pb-1.5">Kontak Kami</h4>
            <p class="flex items-start mb-2 justify-start text-xs sm:text-sm text-gray-300">
                <svg class="w-4 h-4 mr-1.5 text-amber-400 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zm-1 9a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                <span>Jl Ranggaesera No. 596, Sidareja - Cilacap 53213</span>
            </p>
            <p class="flex items-center mb-2 justify-start text-xs sm:text-sm text-gray-300">
                <svg class="w-4 h-4 mr-1.5 text-amber-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.956.7L6.5 6H8V3a1 1 0 011-1h4a1 1 0 011 1v3h1.347l.391-2.3A1 1 0 0117 2h2a1 1 0 011 1v14a1 1 0 01-1 1h-2a1 1 0 01-1-1v-4.153a1 1 0 01-.7-.956L14.5 14H12v3a1 1 0 01-1 1H7a1 1 0 01-1-1v-3H4.653l-.391 2.3A1 1 0 013 18H2a1 1 0 01-1-1V3a1 1 0 011-1zM5 4h10v2H5V4zm0 4h10v2H5V8zm0 4h10v2H5v-2z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                <span>(0280) 523896</span>
            </p>
            <p class="flex items-center justify-start text-xs sm:text-sm text-gray-300">
                <svg class="w-4 h-4 mr-1.5 text-amber-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                <span class="break-all">paroki.santosyoseph@gmail.com</span>
            </p>
        </div>

        {{-- Jadwal Buka Sekretariat --}}
        <div>
            <h4 class="text-sm sm:text-lg font-semibold mb-3 text-gray-50 border-b border-blue-900 pb-1.5">Sekretariat</h4>
            <p class="mb-0.5 text-gray-300 font-medium text-xs sm:text-sm">Senin - Jumat</p>
            <p class="text-[11px] sm:text-xs text-amber-400 mb-2 font-semibold">08.00 - 15.00 WIB</p>
            <p class="mb-0.5 text-gray-300 font-medium text-xs sm:text-sm">Sabtu - Minggu</p>
            <p class="text-[11px] sm:text-xs text-gray-400 font-semibold">Tutup</p>
        </div>

        {{-- Peta Situs --}}
        <div>
            <h4 class="text-sm sm:text-lg font-semibold mb-3 text-gray-50 border-b border-blue-900 pb-1.5">Peta Situs</h4>
            <ul class="text-gray-300 text-xs sm:text-sm space-y-1.5">
                <li><a href="{{ route('public.home') }}" class="hover:text-amber-400 transition-colors flex items-center gap-1">&rarr; Beranda</a></li>
                <li><a href="{{ route('public.schedules') }}" class="hover:text-amber-400 transition-colors flex items-center gap-1">&rarr; Jadwal Misa</a></li>
                <li><a href="{{ route('public.announcements') }}" class="hover:text-amber-400 transition-colors flex items-center gap-1">&rarr; Pengumuman</a></li>
                <li><a href="{{ route('public.events') }}" class="hover:text-amber-400 transition-colors flex items-center gap-1">&rarr; Agenda</a></li>
                <li><a href="{{ route('public.galleries') }}" class="hover:text-amber-400 transition-colors flex items-center gap-1">&rarr; Galeri</a></li>
            </ul>
        </div>
    </div>
</footer>
@endsection