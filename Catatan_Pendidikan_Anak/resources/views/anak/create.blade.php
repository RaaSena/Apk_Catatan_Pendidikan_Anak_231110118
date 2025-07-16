@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow">

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Validasi --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Data Anak</h2>

    <form action="{{ route('anak.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="nama" class="block font-semibold text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan nama"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                value="{{ old('nama') }}">
        </div>

        <div>
            <label for="umur" class="block font-semibold text-gray-700">Umur</label>
            <input type="number" name="umur" id="umur" placeholder="Masukkan umur"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                value="{{ old('umur') }}">
        </div>

        <div>
            <label for="kelas" class="block font-semibold text-gray-700">Kelas</label>
            <input type="text" name="kelas" id="kelas" placeholder="Contoh: 5A"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                value="{{ old('kelas') }}">
        </div>

        <div>
            <label for="sekolah" class="block font-semibold text-gray-700">Sekolah</label>
            <input type="text" name="sekolah" id="sekolah" placeholder="Nama sekolah"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                value="{{ old('sekolah') }}">
        </div>

        <div>
            <label for="nilai" class="block font-semibold text-gray-700">Nilai</label>
            <input type="number" step="0.01" name="nilai" id="nilai" placeholder="Contoh: 85.5"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                value="{{ old('nilai') }}">
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('anak.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan</button>
        </div>
    </form>

</div>
@endsection
