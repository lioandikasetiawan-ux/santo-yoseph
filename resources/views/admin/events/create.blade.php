@extends('layouts.admin')

@section('title', 'Tambah Agenda Kegiatan')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-xl shadow-sm border border-gray-100">
    <h1 class="text-xl font-bold text-gray-800 mb-6">Tambah Agenda Kegiatan Baru</h1>

    @if ($errors->any())
        <div class="bg-red-50 text-red-700 p-4 rounded-lg mb-6 text-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kegiatan</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal & Waktu Pelaksanaan</label>
            <input type="datetime-local" name="event_date" value="{{ old('event_date') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
            <input type="text" name="location" value="{{ old('location') }}" required placeholder="Contoh: Gedung BKR / Lapangan Paroki" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Poster / Gambar Kegiatan (Opsional)</label>
            <input type="file" id="imageInput" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg outline-none">
            <p class="text-xs text-gray-500 mt-1">* Ukuran file maksimal <strong>2 MB</strong> (format: JPG, PNG, WEBP).</p>
            <p id="imageError" class="text-xs text-red-600 font-semibold mt-1 hidden">Ukuran file melebihi 2 MB! Silakan pilih file yang lebih kecil.</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Kegiatan</label>
            <textarea name="description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">{{ old('description') }}</textarea>
        </div>

        <div class="flex space-x-3 pt-4">
            <button type="submit" id="submitBtn" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg">Simpan</button>
            <a href="{{ route('admin.events.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-5 py-2 rounded-lg">Batal</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('imageInput').addEventListener('change', function() {
        const file = this.files[0];
        const errorText = document.getElementById('imageError');
        const submitBtn = document.getElementById('submitBtn');

        if (file) {
            // 2 MB = 2 * 1024 * 1024 bytes
            if (file.size > 2 * 1024 * 1024) {
                errorText.classList.remove('hidden');
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                errorText.classList.add('hidden');
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }
    });
</script>
@endsection