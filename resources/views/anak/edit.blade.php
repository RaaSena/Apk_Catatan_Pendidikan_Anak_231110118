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

    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Data Anak</h1>

    <form action="{{ route('anak.update', $anak->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block font-semibold text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $anak->nama) }}"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                required>
        </div>

        <div>
            <label for="umur" class="block font-semibold text-gray-700">Umur</label>
            <input type="number" name="umur" id="umur" value="{{ old('umur', $anak->umur) }}"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                required>
        </div>

        <div>
            <label for="kelas" class="block font-semibold text-gray-700">Kelas</label>
            <input type="text" name="kelas" id="kelas" value="{{ old('kelas', $anak->kelas) }}"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                required>
        </div>

        <div>
            <label for="sekolah" class="block font-semibold text-gray-700">Sekolah</label>
            <input type="text" name="sekolah" id="sekolah" value="{{ old('sekolah', $anak->sekolah) }}"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                required>
        </div>

        <div>
            <label for="nilai" class="block font-semibold text-gray-700">Nilai</label>
            <input type="number" step="0.01" name="nilai" id="nilai" value="{{ old('nilai', $anak->nilai) }}"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                required>
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('anak.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
            <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Update</button>
        </div>
    </form>
</div>
@endsection
