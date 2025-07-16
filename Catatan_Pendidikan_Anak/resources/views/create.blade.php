@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
    <h1 class="text-xl font-bold mb-4">Tambah Data Anak</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('anak.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-medium">Nama</label>
            <input type="text" name="nama" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Umur</label>
            <input type="number" name="umur" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Kelas</label>
            <input type="text" name="kelas" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Sekolah</label>
            <input type="text" name="sekolah" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Nilai</label>
            <input type="number" step="0.01" name="nilai" class="w-full border p-2 rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
