@extends('layouts.admin')

@section('title', 'Edit Jadwal Misa')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-xl shadow-sm border border-gray-100">
    <h1 class="text-xl font-bold text-gray-800 mb-6">Edit Jadwal Misa</h1>

    <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama / Jenis Misa</label>
            <input type="text" name="title" value="{{ old('title', $schedule->title) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal & Waktu</label>
            <input type="datetime-local" name="schedule_time" value="{{ old('schedule_time', \Carbon\Carbon::parse($schedule->schedule_time)->format('Y-m-d\TH:i')) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
            <input type="text" name="location" value="{{ old('location', $schedule->location) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan Tambahan (Opsional)</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">{{ old('description', $schedule->description) }}</textarea>
        </div>

        <div class="flex items-center">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ $schedule->is_active ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 mr-2">
            <label for="is_active" class="text-sm text-gray-700">Tampilkan di Halaman Publik</label>
        </div>

        <div class="flex space-x-3 pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg">Update</button>
            <a href="{{ route('admin.schedules.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-5 py-2 rounded-lg">Batal</a>
        </div>
    </form>
</div>
@endsection