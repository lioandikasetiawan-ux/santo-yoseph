@extends('layouts.admin')

@section('title', 'Edit Pengumuman')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-xl shadow-sm border border-gray-100">
    <h1 class="text-xl font-bold text-gray-800 mb-6">Edit Pengumuman</h1>

    <form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Pengumuman</label>
            <input type="text" name="title" value="{{ old('title', $announcement->title) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Terbit</label>
            <input type="datetime-local" name="published_at" value="{{ old('published_at', $announcement->published_at ? \Carbon\Carbon::parse($announcement->published_at)->format('Y-m-d\TH:i') : '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar / Banner (Kosongkan jika tidak diubah)</label>
            @if($announcement->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $announcement->image) }}" class="w-24 h-24 object-cover rounded-lg border">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Isi Pengumuman</label>
            <textarea name="content" rows="6" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">{{ old('content', $announcement->content) }}</textarea>
        </div>

        <div class="flex space-x-3 pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg">Update</button>
            <a href="{{ route('admin.announcements.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-5 py-2 rounded-lg">Batal</a>
        </div>
    </form>
</div>
@endsection