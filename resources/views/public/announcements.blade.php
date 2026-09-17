@extends('layouts.public')

@section('title', 'Pengumuman - Paroki')

@section('content')
<div class="bg-blue-900 text-white py-12 mb-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-3xl font-extrabold mb-2">Pengumuman Paroki</h1>
        <p class="text-blue-100 text-sm">Informasi dan pengumuman resmi dari pengurus paroki.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($announcements as $item)
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition">
            <div>
                <span class="text-xs text-gray-400 font-medium">📅 {{ $item->created_at->translatedFormat('d M Y') }}</span>
                <h3 class="font-bold text-xl text-gray-800 mt-2 mb-3 leading-snug">{{ $item->title }}</h3>
                <p class="text-gray-600 text-sm line-clamp-3 leading-relaxed">{{ Str::limit(strip_tags($item->content), 150) }}</p>
            </div>
            <div class="mt-6 pt-4 border-t border-gray-100 flex justify-end">
                <a href="{{ route('public.announcements.detail', $item->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm inline-flex items-center space-x-1">
                    <span>Baca Selengkapnya</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-full py-12 text-center text-gray-500 bg-white rounded-xl border border-gray-100">
            Belum ada pengumuman terbaru saat ini.
        </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $announcements->links() }}
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