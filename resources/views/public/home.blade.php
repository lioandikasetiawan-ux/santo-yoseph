@extends('layouts.public')

@section('title', 'Beranda - Paroki Santo Yoseph Sidareja')

@section('content')
<!-- Hero Carousel Section with Responsive Margin & Rounded Corners -->
<div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 mt-3 md:mt-6">
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
                }, 5000);
            },
            stopAutoSlide() {
                clearInterval(this.timer);
            }
        }" 
        x-init="startAutoSlide()" 
        @mouseenter="stopAutoSlide()" 
        @mouseleave="startAutoSlide()"
        class="relative w-full overflow-hidden bg-slate-950 shadow-2xl rounded-[2.5rem] md:rounded-[4rem]">

        <!-- Slide Containers -->
        <div class="relative h-[420px] sm:h-[480px] md:h-[620px] w-full overflow-hidden rounded-[2.5rem] md:rounded-[4rem]">
            <template x-for="slide in slides" :key="slide.id">
                <div x-show="activeSlide === slide.id" 
                     x-transition:enter="transition ease-out duration-1000 transform"
                     x-transition:enter-start="opacity-0 scale-105"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-700 transform"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute inset-0 bg-cover bg-center flex flex-col justify-center items-center text-center px-4 sm:px-6 rounded-[2.5rem] md:rounded-[4rem]"
                     :style="`background-image: url('${slide.image}')`">
                    
                    <!-- Overlay Gradient Modern -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/70 to-slate-950/30 backdrop-blur-[1px] rounded-[2.5rem] md:rounded-[4rem]"></div>
                    
                    <!-- Glowing Background Blob -->
                    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 md:w-96 md:h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="relative z-10 max-w-4xl space-y-3 md:space-y-6 px-2 sm:px-4">
                        <div class="inline-block">
                            <span class="text-[10px] md:text-xs font-bold tracking-widest uppercase bg-gradient-to-r from-amber-500/30 to-amber-600/30 text-amber-300 border border-amber-400/40 px-3.5 py-1 md:px-4 md:py-1.5 rounded-full backdrop-blur-md shadow-lg shadow-amber-500/10">
                                <span x-text="slide.badge"></span>
                            </span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl md:text-5xl lg:text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-100 to-amber-200 tracking-tight drop-shadow-2xl font-serif leading-tight" 
                            x-text="slide.title"></h1>
                        <p class="text-slate-300 text-xs sm:text-sm md:text-base max-w-2xl mx-auto font-light leading-relaxed drop-shadow" 
                           x-text="slide.subtitle"></p>
                    </div>
                </div>
            </template>
        </div>

        <!-- Navigasi Slider -->
        <button @click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1" 
                class="absolute left-3 md:left-6 top-1/2 -translate-y-1/2 bg-slate-900/40 hover:bg-amber-500 hover:text-slate-950 text-white p-2.5 md:p-3.5 rounded-full backdrop-blur-md border border-white/15 transition-all duration-300 z-20 shadow-xl group hover:scale-110 active:scale-95">
            <svg class="w-4 h-4 md:w-5 md:h-5 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button @click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1" 
                class="absolute right-3 md:right-6 top-1/2 -translate-y-1/2 bg-slate-900/40 hover:bg-amber-500 hover:text-slate-950 text-white p-2.5 md:p-3.5 rounded-full backdrop-blur-md border border-white/15 transition-all duration-300 z-20 shadow-xl group hover:scale-110 active:scale-95">
            <svg class="w-4 h-4 md:w-5 md:h-5 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-4 md:bottom-6 left-1/2 -translate-x-1/2 flex items-center space-x-2 z-20">
            <template x-for="slide in slides" :key="slide.id">
                <button @click="activeSlide = slide.id" 
                        :class="activeSlide === slide.id ? 'bg-amber-400 w-7 md:w-9 shadow-lg shadow-amber-500/50' : 'bg-white/30 hover:bg-white/60 w-2 md:w-2.5'" 
                        class="h-2 md:h-2.5 rounded-full transition-all duration-500"></button>
            </template>
        </div>
    </div>
</div>

<!-- Main Content Wrapper dengan Responsive Spacing -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 md:mt-12 py-8 md:py-16 space-y-14 md:space-y-24">

    <!-- SECTION 1: JADWAL MISA -->
<div class="space-y-8 md:space-y-12">
        <!-- Header Section -->
        <div class="text-center max-w-2xl mx-auto space-y-3 md:space-y-5">
            <div>
                <span class="inline-block text-[11px] md:text-xs font-bold uppercase tracking-widest px-3.5 py-1 md:px-4 md:py-1.5 rounded-full bg-amber-500/10 text-amber-600 border border-amber-200">
                    Jadwal Peribadatan
                </span>
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-slate-900 font-serif tracking-tight leading-snug">
                Perayaan Ekaristi Paroki
            </h2>
            <div class="w-12 md:w-16 h-1.5 bg-amber-500 mx-auto rounded-full mt-2"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
            <!-- Misa Rutin -->
            <div class="group relative bg-white/80 backdrop-blur-xl rounded-[2rem] border border-slate-200/80 shadow-xl shadow-slate-200/40 p-5 sm:p-6 md:p-8 hover:shadow-2xl hover:shadow-amber-500/10 transition-all duration-300">
                <div class="flex justify-between items-center mb-5 pb-4 border-b border-slate-100">
                    <div class="flex items-center space-x-3">
                        <div class="p-2.5 md:p-3 bg-amber-500 text-slate-950 rounded-2xl shadow-lg shadow-amber-500/30">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-slate-900 font-serif">Misa Harian</h3>
                    </div>
                    <a href="{{ route('public.schedules') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 flex items-center gap-1 transition">
                        Detail &rarr;
                    </a>
                </div>

                <div class="space-y-3.5">
                    <div class="p-3.5 md:p-4 bg-slate-50 rounded-2xl border border-slate-200/60 flex items-center justify-between hover:border-amber-400 transition">
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold bg-amber-500 text-slate-950 px-2.5 py-0.5 rounded-full uppercase tracking-wider">Senin - Jumat</span>
                            <h4 class="font-bold text-xs md:text-sm text-slate-800">Misa Harian Pagi</h4>
                        </div>
                        <div class="text-right">
                            <p class="text-sm md:text-base font-black text-slate-900">06.00 WIB</p>
                            <p class="text-[11px] text-slate-500 font-medium">Gereja Utama</p>
                        </div>
                    </div>

                    <div class="p-3.5 md:p-4 bg-slate-50 rounded-2xl border border-slate-200/60 flex items-center justify-between hover:border-amber-400 transition">
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold bg-amber-500 text-slate-950 px-2.5 py-0.5 rounded-full uppercase tracking-wider">Sabtu Sore</span>
                            <h4 class="font-bold text-xs md:text-sm text-slate-800">Misa Vigili</h4>
                        </div>
                        <div class="text-right">
                            <p class="text-sm md:text-base font-black text-slate-900">18.00 WIB</p>
                            <p class="text-[11px] text-slate-500 font-medium">Gereja Utama</p>
                        </div>
                    </div>

                    <div class="p-3.5 md:p-4 bg-slate-50 rounded-2xl border border-slate-200/60 flex items-center justify-between hover:border-amber-400 transition">
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold bg-amber-500 text-slate-950 px-2.5 py-0.5 rounded-full uppercase tracking-wider">Minggu Pagi</span>
                            <h4 class="font-bold text-xs md:text-sm text-slate-800">Misa Mingguan</h4>
                        </div>
                        <div class="text-right">
                            <p class="text-sm md:text-base font-black text-slate-900">07.00 WIB</p>
                            <p class="text-[11px] text-slate-500 font-medium">Gereja Utama</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Misa Khusus -->
            <div class="group relative bg-white/80 backdrop-blur-xl rounded-[2rem] border border-slate-200/80 shadow-xl shadow-slate-200/40 p-5 sm:p-6 md:p-8 hover:shadow-2xl hover:shadow-amber-500/10 transition-all duration-300">
                <div class="flex justify-between items-center mb-5 pb-4 border-b border-slate-100">
                    <div class="flex items-center space-x-3">
                        <div class="p-2.5 md:p-3 bg-slate-900 text-amber-400 rounded-2xl shadow-lg shadow-slate-900/30">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-slate-900 font-serif">Misa Khusus dan Hari Raya</h3>
                    </div>
                    <a href="{{ route('public.schedules') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 flex items-center gap-1 transition">
                        Semua &rarr;
                    </a>
                </div>

                <div class="space-y-3.5">
                    @forelse($schedules->take(3) as $item)
                    @php $dt = \Carbon\Carbon::parse($item->schedule_time); @endphp
                    <div class="p-3.5 md:p-4 bg-slate-50 rounded-2xl border border-slate-200/60 flex items-center justify-between hover:border-amber-400 transition">
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold bg-slate-900 text-amber-400 px-2.5 py-0.5 rounded-full uppercase tracking-wider">
                                {{ $dt->translatedFormat('d M Y') }}
                            </span>
                            <h4 class="font-bold text-xs md:text-sm text-slate-800">{{ $item->title }}</h4>
                        </div>
                        <div class="text-right">
                            <p class="text-sm md:text-base font-black text-slate-900">{{ $dt->format('H:i') }} WIB</p>
                            <p class="text-[11px] text-slate-500 font-medium">{{ $item->location }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="py-10 text-center text-xs font-medium text-slate-400">Belum ada jadwal misa khusus mendatang.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 2: PENGUMUMAN & AGENDA -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-14">
        <!-- Pengumuman -->
        <div class="lg:col-span-2 space-y-5">
            <div class="flex justify-between items-end pb-2 border-b border-slate-100">
                <div>
                    <span class="text-[11px] md:text-xs font-bold uppercase tracking-widest text-amber-600">Informasi Umat</span>
                    <h3 class="text-xl md:text-2xl font-bold text-slate-900 font-serif">Pengumuman Terbaru</h3>
                </div>
                <a href="{{ route('public.announcements') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 flex items-center gap-1 group">
                    Lihat Semua <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                </a>
            </div>

            <div class="space-y-4">
                @forelse($announcements->take(3) as $announcement)
                <div class="group bg-white rounded-[2rem] p-5 md:p-6 border border-slate-100 shadow-md hover:shadow-xl hover:border-amber-200 transition-all duration-300">
                    <div class="flex items-center gap-2 text-[11px] text-amber-600 font-semibold mb-2">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ $announcement->created_at ? $announcement->created_at->translatedFormat('d M Y') : '-' }}</span>
                    </div>
                    <h4 class="font-bold text-slate-800 text-base md:text-lg mb-2 group-hover:text-amber-600 transition">
                        <a href="{{ route('public.announcements.detail', $announcement->slug ?? $announcement->id) }}">
                            {{ $announcement->title }}
                        </a>
                    </h4>
                    <p class="text-slate-500 text-xs md:text-sm line-clamp-2 leading-relaxed mb-3">
                        {{ Str::limit(strip_tags($announcement->content), 150) }}
                    </p>
                    <a href="{{ route('public.announcements.detail', $announcement->slug ?? $announcement->id) }}" 
                       class="inline-flex items-center text-xs font-bold text-slate-700 group-hover:text-amber-600 transition gap-1">
                        Baca Selengkapnya 
                        <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
                @empty
                <div class="p-6 text-center text-xs text-slate-400 bg-white rounded-[2rem] border border-slate-100">Belum ada pengumuman terbaru.</div>
                @endforelse
            </div>
        </div>

        <!-- Agenda Kegiatan -->
        <div class="space-y-5">
            <div class="flex justify-between items-end pb-2 border-b border-slate-100">
                <div>
                    <span class="text-[11px] md:text-xs font-bold uppercase tracking-widest text-indigo-600">Kalender</span>
                    <h3 class="text-xl md:text-2xl font-bold text-slate-900 font-serif">Agenda Paroki</h3>
                </div>
                <a href="{{ route('public.events') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-700">
                    Semua &rarr;
                </a>
            </div>

            <div class="space-y-3.5">
                @forelse($events->take(3) as $agenda)
                <a href="{{ route('public.events.detail', $agenda->slug ?? $agenda->id) }}" 
                   class="group bg-white p-3.5 md:p-4 rounded-[2rem] border border-slate-100 shadow-md hover:shadow-lg hover:border-indigo-200 transition-all duration-300 flex items-center gap-3.5">
                    <div class="bg-gradient-to-b from-indigo-500 to-indigo-700 text-white px-3 py-2 rounded-2xl text-center min-w-[58px] shadow-md shadow-indigo-500/20 group-hover:scale-105 transition-transform">
                        <span class="block text-[10px] font-bold uppercase tracking-wider text-indigo-100">{{ \Carbon\Carbon::parse($agenda->event_date)->translatedFormat('M') }}</span>
                        <span class="block text-lg font-black leading-none mt-0.5">{{ \Carbon\Carbon::parse($agenda->event_date)->format('d') }}</span>
                    </div>
                    <div class="overflow-hidden">
                        <h4 class="font-bold text-xs md:text-sm text-slate-800 group-hover:text-indigo-600 transition truncate">{{ $agenda->title }}</h4>
                        <p class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                            <svg class="w-3 h-3 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="truncate">{{ $agenda->location ?? 'Lingkungan Paroki' }}</span>
                        </p>
                    </div>
                </a>
                @empty
                <div class="p-6 text-center text-xs text-slate-400 bg-white rounded-[2rem] border border-slate-100">Belum ada agenda mendatang.</div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- SECTION 3: GALERI FOTO TERBARU -->
    <div class="space-y-6">
        <div class="flex justify-between items-end">
            <div>
                <span class="text-[11px] md:text-xs font-bold uppercase tracking-widest text-emerald-600">Dokumentasi</span>
                <h3 class="text-xl md:text-3xl font-bold text-slate-900 font-serif">Galeri Foto Kegiatan</h3>
            </div>
            <a href="{{ route('public.galleries') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700 flex items-center gap-1 group">
                Lihat Galeri <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            @forelse($galleries->take(4) as $item)
            <div class="group relative bg-white rounded-[1.75rem] md:rounded-[2rem] border border-slate-100 shadow-md hover:shadow-2xl overflow-hidden transition-all duration-500 hover:-translate-y-1">
                <div class="relative aspect-[4/3] bg-slate-900 overflow-hidden">
                    <img src="{{ Storage::url($item->image_path) }}" 
                         alt="{{ $item->title }}" 
                         class="w-full h-full object-cover group-hover:scale-110 group-hover:rotate-1 transition-transform duration-700 ease-out opacity-90 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-3.5 md:p-4 bg-white">
                    <h4 class="font-bold text-slate-800 text-xs md:text-sm truncate group-hover:text-emerald-600 transition" title="{{ $item->title }}">{{ $item->title }}</h4>
                    <span class="inline-block mt-1 text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full">
                        {{ $item->category ?? 'Kegiatan' }}
                    </span>
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center text-xs text-slate-400 bg-white rounded-[2rem] border border-slate-100">
                Belum ada dokumentasi foto.
            </div>
            @endforelse
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