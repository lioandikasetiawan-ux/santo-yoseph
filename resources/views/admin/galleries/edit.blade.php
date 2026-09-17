@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('content')
<div class="max-w-xl bg-white p-6 rounded-xl shadow-sm border border-gray-100">
    <h1 class="text-xl font-bold text-gray-800 mb-6">Edit Foto Galeri</h1>

    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul / Nama Foto</label>
            <input type="text" name="title" value="{{ old('title', $gallery->title) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Foto Saat Ini</label>
            <div class="mb-2">
                <img src="{{ asset('storage/' . $gallery->image_path) }}" class="w-32 h-24 object-cover rounded-lg border">
            </div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Foto (Kosongkan jika tidak diubah)</label>
            <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori (Opsional)</label>
            <input type="text" name="category" value="{{ old('category', $gallery->category) }}" placeholder="Contoh: Perayaan Natal, Futsal, Kegiatan Paroki" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div class="flex space-x-3 pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg">Update</button>
            <a href="{{ route('admin.galleries.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-5 py-2 rounded-lg">Batal</a>
        </div>
    </form>
</div>
@endsection 