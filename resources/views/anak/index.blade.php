@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">Catatan Pendidikan Anak</h1>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah dan Pencarian --}}
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('anak.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Tambah Data
        </a>

        <form action="{{ route('anak.index') }}" method="GET" class="flex space-x-2">
            <input type="text" name="search" placeholder="Cari nama, sekolah, atau kelas"
                value="{{ request('search') }}"
                class="border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring focus:border-blue-300">
            <button type="submit"
                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Cari</button>
        </form>
    </div>

    {{-- Tabel Data --}}
    <div class="overflow-x-auto shadow rounded">
        <table class="min-w-full border bg-white">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="py-2 px-4 border">No</th>
                    <th class="py-2 px-4 border">Nama</th>
                    <th class="py-2 px-4 border">Umur</th>
                    <th class="py-2 px-4 border">Kelas</th>
                    <th class="py-2 px-4 border">Sekolah</th>
                    <th class="py-2 px-4 border">Nilai</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $anak)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border">{{ $anak->nama }}</td>
                        <td class="py-2 px-4 border">{{ $anak->umur }}</td>
                        <td class="py-2 px-4 border">{{ $anak->kelas }}</td>
                        <td class="py-2 px-4 border">{{ $anak->sekolah }}</td>
                        <td class="py-2 px-4 border">{{ $anak->nilai }}</td>
                        <td class="py-2 px-4 border space-x-2">
                            <a href="{{ route('anak.show', $anak->id) }}"
                                class="bg-indigo-500 text-white px-2 py-1 rounded hover:bg-indigo-600">Detail</a>
                            <a href="{{ route('anak.edit', $anak->id) }}"
                                class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('anak.destroy', $anak->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-2 px-4 border text-center" colspan="7">Belum ada data anak</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
