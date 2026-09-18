@extends('layouts.public')

@section('title', 'Beranda - Paroki Santo Yoseph Sidareja')

@section('content')
<!-- Hero Carousel Section Lebih Ringkas di HP -->
<div class="w-full px-0 mt-0">
    <div x-data="{ 
            activeSlide: 1, 
            slides: [
                { 
                    id: 1, 
                    badge: 'Selamat Datang',
                    title: 'Paroki Santo Yoseph Sidareja', 
                    subtitle: 'Pusat informasi kegiatan, pengumuman, dan pelayanan perayaan ekaristi paroki.',
                    image: '{{ asset("images/landing.jpg") }}' 
                },
                { 
                    id: 2, 
                    badge: 'Peribadatan',
                    title: 'Perayaan Ekaristi Suci', 
                    subtitle: 'Mari bergabung dalam perayaan misa harian dan mingguan bersama seluruh umat paroki.',
                    image: '{{ asset("images/gereja-1.jpeg") }}' 
                },
                { 
                    id: 3, 
                    badge: 'Komunitas & Pelayanan',
                    title: 'Pelayanan Umat & Warta Paroki', 
                    subtitle: 'Dapatkan informasi berita terbaru, warta, dan agenda kegiatan di lingkungan paroki.',
                    image: '{{ asset("images/tentang_gereja_card.jpg") }}' 
                }
            ],
            timer: null,
            startAutoSlide() {
                this.timer = setInterval(() => {
                    this.activeSlide = this.activeSlide === this.slides.length ? 1 : this.activeSlide + 1;
                }, 3000);
            },
            stopAutoSlide() {
                clearInterval(this.timer);
            }
        }" 
        x-init="startAutoSlide()" 
        class="relative w-full overflow-hidden bg-slate-950 shadow-xl">

        <!-- Slide Containers (Tinggi dikurangi di HP: h-[360px]) -->
        <div class="relative h-[360px] sm:h-[460px] md:h-[580px] lg:h-[680px] w-full overflow-hidden">
            <template x-for="slide in slides" :key="slide.id">
                <div x-show="activeSlide === slide.id" 
                     x-transition:enter="transition ease-out duration-1000 transform"
                     x-transition:enter-start="opacity-0 scale-105"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-700 transform"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute inset-0 bg-cover bg-center flex flex-col justify-center items-center text-center px-4"
                     :style="`background-image: url('${slide.image}')`">
                    
                    <!-- Overlay Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/70 to-slate-950/30"></div>

                    <div class="relative z-10 max-w-3xl space-y-2 md:space-y-4 px-2">
                        <div class="inline-block">
                            <span class="text-[9px] md:text-xs font-bold tracking-widest uppercase bg-amber-500/30 text-amber-300 border border-amber-400/40 px-3 py-0.5 rounded-full backdrop-blur-md">
                                <span x-text="slide.badge"></span>
                            </span>
                        </div>
                        <h1 class="text-xl sm:text-2xl md:text-4xl lg:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-100 to-amber-200 tracking-tight font-serif leading-tight" 
                            x-text="slide.title"></h1>
                        <p class="text-slate-300 text-[11px] sm:text-xs md:text-sm max-w-xl mx-auto font-light leading-relaxed" 
                           x-text="slide.subtitle"></p>
                    </div>
                </div>
            </template>
        </div>

        <!-- Navigasi Slider -->
        <button @click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1" 
                class="absolute left-3 top-1/2 -translate-y-1/2 bg-slate-900/40 hover:bg-amber-500 hover:text-slate-950 text-white p-2.5 rounded-full backdrop-blur-md border border-white/15 transition-all z-20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button @click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1" 
                class="absolute right-3 top-1/2 -translate-y-1/2 bg-slate-900/40 hover:bg-amber-500 hover:text-slate-950 text-white p-2.5 rounded-full backdrop-blur-md border border-white/15 transition-all z-20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex items-center space-x-1.5 z-20">
            <template x-for="slide in slides" :key="slide.id">
                <button @click="activeSlide = slide.id" 
                        :class="activeSlide === slide.id ? 'bg-amber-400 w-6' : 'bg-white/30 w-2'" 
                        class="h-1.5 rounded-full transition-all duration-300"></button>
            </template>
        </div>
    </div>
</div>

<!-- Main Content Wrapper -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 py-6 space-y-10">

    <!-- SECTION 1: JADWAL MISA (Dibuat Lebih Compact / Kecil) -->
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="text-center max-w-xl mx-auto space-y-2">
            <span class="inline-block text-[10px] font-bold uppercase tracking-widest px-3 py-0.5 rounded-full bg-amber-500/10 text-amber-600 border border-amber-200">
                Jadwal Peribadatan
            </span>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-black text-slate-900 font-serif tracking-tight">
                Perayaan Ekaristi Paroki
            </h2>
            <div class="w-10 h-1 bg-amber-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
            <!-- Misa Rutin -->
            <div class="bg-white/90 backdrop-blur-xl rounded-2xl border border-slate-200/80 shadow-md p-4 sm:p-5">
                <div class="flex justify-between items-center mb-3 pb-3 border-b border-slate-100">
                    <div class="flex items-center space-x-2.5">
                        <div class="p-2 bg-amber-500 text-slate-950 rounded-xl shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <h3 class="text-sm sm:text-base font-bold text-slate-900 font-serif">Misa Harian</h3>
                    </div>
                    <a href="{{ route('public.schedules') }}" class="text-[11px] font-bold text-amber-600 hover:text-amber-700">Detail &rarr;</a>
                </div>

                <div class="space-y-2.5">
                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-200/60 flex items-center justify-between">
                        <div>
                            <span class="text-[9px] font-bold bg-amber-500 text-slate-950 px-2 py-0.5 rounded-full uppercase">Senin - Jumat</span>
                            <h4 class="font-bold text-xs text-slate-800 mt-0.5">Misa Harian Pagi</h4>
                        </div>
                        <div class="text-right">
                            <p class="text-xs sm:text-sm font-black text-slate-900">05.30 WIB</p>
                            <p class="text-[10px] text-slate-500">Gereja Utama</p>
                        </div>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-200/60 flex items-center justify-between">
                        <div>
                            <span class="text-[9px] font-bold bg-amber-500 text-slate-950 px-2 py-0.5 rounded-full uppercase">Sabtu Sore</span>
                            <h4 class="font-bold text-xs text-slate-800 mt-0.5">Misa Harian Sore</h4>
                        </div>
                        <div class="text-right">
                            <p class="text-xs sm:text-sm font-black text-slate-900">18.00 WIB</p>
                            <p class="text-[10px] text-slate-500">Gereja Utama</p>
                        </div>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-200/60 flex items-center justify-between">
                        <div>
                            <span class="text-[9px] font-bold bg-amber-500 text-slate-950 px-2 py-0.5 rounded-full uppercase">Minggu Pagi</span>
                            <h4 class="font-bold text-xs text-slate-800 mt-0.5">Misa Mingguan</h4>
                        </div>
                        <div class="text-right">
                            <p class="text-xs sm:text-sm font-black text-slate-900">07.00 WIB</p>
                            <p class="text-[10px] text-slate-500">Gereja Utama</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Misa Khusus -->
            <div class="bg-white/90 backdrop-blur-xl rounded-2xl border border-slate-200/80 shadow-md p-4 sm:p-5">
                <div class="flex justify-between items-center mb-3 pb-3 border-b border-slate-100">
                    <div class="flex items-center space-x-2.5">
                        <div class="p-2 bg-slate-900 text-amber-400 rounded-xl shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        </div>
                        <h3 class="text-sm sm:text-base font-bold text-slate-900 font-serif">Misa Khusus & Hari Raya</h3>
                    </div>
                    <a href="{{ route('public.schedules') }}" class="text-[11px] font-bold text-amber-600 hover:text-amber-700">Semua &rarr;</a>
                </div>

                <div class="space-y-2.5">
                    @forelse($schedules->take(3) as $item)
                    @php $dt = \Carbon\Carbon::parse($item->schedule_time); @endphp
                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-200/60 flex items-center justify-between">
                        <div>
                            <span class="text-[9px] font-bold bg-slate-900 text-amber-400 px-2 py-0.5 rounded-full uppercase">
                                {{ $dt->translatedFormat('d M Y') }}
                            </span>
                            <h4 class="font-bold text-xs text-slate-800 mt-0.5">{{ $item->title }}</h4>
                        </div>
                        <div class="text-right">
                            <p class="text-xs sm:text-sm font-black text-slate-900">{{ $dt->format('H:i') }} WIB</p>
                            <p class="text-[10px] text-slate-500">{{ $item->location }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="py-6 text-center text-xs text-slate-400">Belum ada jadwal misa khusus mendatang.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 2: PENGUMUMAN & AGENDA -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Pengumuman -->
        <div class="lg:col-span-2 space-y-3">
            <div class="flex justify-between items-end pb-2 border-b border-slate-100">
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-amber-600">Informasi Umat</span>
                    <h3 class="text-lg font-bold text-slate-900 font-serif">Pengumuman Terbaru</h3>
                </div>
                <a href="{{ route('public.announcements') }}" class="text-xs font-bold text-amber-600">Lihat Semua &rarr;</a>
            </div>

            <div class="space-y-3">
                @forelse($announcements->take(3) as $announcement)
                <div class="bg-white rounded-xl p-4 border border-slate-100 shadow-sm">
                    <div class="flex items-center gap-1.5 text-[10px] text-amber-600 font-semibold mb-1">
                        <span>{{ $announcement->created_at ? $announcement->created_at->translatedFormat('d M Y') : '-' }}</span>
                    </div>
                    <h4 class="font-bold text-slate-800 text-xs sm:text-sm mb-1">
                        <a href="{{ route('public.announcements.detail', $announcement->slug ?? $announcement->id) }}" class="hover:text-amber-600">
                            {{ $announcement->title }}
                        </a>
                    </h4>
                    <p class="text-slate-500 text-[11px] line-clamp-2 leading-relaxed">
                        {{ Str::limit(strip_tags($announcement->content), 120) }}
                    </p>
                </div>
                @empty
                <div class="p-4 text-center text-xs text-slate-400 bg-white rounded-xl">Belum ada pengumuman.</div>
                @endforelse
            </div>
        </div>

        <!-- Agenda Kegiatan -->
        <div class="space-y-3">
            <div class="flex justify-between items-end pb-2 border-b border-slate-100">
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-indigo-600">Kalender</span>
                    <h3 class="text-lg font-bold text-slate-900 font-serif">Agenda Paroki</h3>
                </div>
                <a href="{{ route('public.events') }}" class="text-xs font-bold text-indigo-600">Semua &rarr;</a>
            </div>

            <div class="space-y-2.5">
                @forelse($events->take(3) as $agenda)
                <a href="{{ route('public.events.detail', $agenda->slug ?? $agenda->id) }}" 
                   class="bg-white p-3 rounded-xl border border-slate-100 shadow-sm flex items-center gap-3">
                    <div class="bg-gradient-to-b from-indigo-500 to-indigo-700 text-white px-2.5 py-1.5 rounded-lg text-center min-w-[48px]">
                        <span class="block text-[9px] font-bold uppercase text-indigo-100">{{ \Carbon\Carbon::parse($agenda->event_date)->translatedFormat('M') }}</span>
                        <span class="block text-sm font-black leading-none">{{ \Carbon\Carbon::parse($agenda->event_date)->format('d') }}</span>
                    </div>
                    <div class="overflow-hidden">
                        <h4 class="font-bold text-xs text-slate-800 truncate">{{ $agenda->title }}</h4>
                        <p class="text-[10px] text-slate-400 mt-0.5 truncate">{{ $agenda->location ?? 'Lingkungan Paroki' }}</p>
                    </div>
                </a>
                @empty
                <div class="p-4 text-center text-xs text-slate-400 bg-white rounded-xl">Belum ada agenda.</div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- SECTION 3: GALERI FOTO -->
    <div class="space-y-3">
        <div class="flex justify-between items-end">
            <div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-emerald-600">Dokumentasi</span>
                <h3 class="text-lg font-bold text-slate-900 font-serif">Galeri Foto Kegiatan</h3>
            </div>
            <a href="{{ route('public.galleries') }}" class="text-xs font-bold text-emerald-600">Lihat Galeri &rarr;</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            @forelse($galleries->take(4) as $item)
            <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="relative aspect-[4/3] bg-slate-900">
                    <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                </div>
                <div class="p-2.5">
                    <h4 class="font-bold text-slate-800 text-[11px] truncate">{{ $item->title }}</h4>
                </div>
            </div>
            @empty
            <div class="col-span-full py-6 text-center text-xs text-slate-400 bg-white rounded-xl">Belum ada foto.</div>
            @endforelse
        </div>
    </div>
</div>

{{-- Footer --}}
<footer class="bg-blue-950 text-gray-200 py-8 md:py-12 border-t border-blue-900">
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