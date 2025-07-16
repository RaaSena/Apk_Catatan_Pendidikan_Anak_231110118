@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8 p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">Detail Anak</h1>

    <div class="mb-4">
        <strong>Nama:</strong>
        <p>{{ $anak->nama }}</p>
    </div>

    <div class="mb-4">
        <strong>Umur:</strong>
        <p>{{ $anak->umur }}</p>
    </div>

    <div class="mb-4">
        <strong>Kelas:</strong>
        <p>{{ $anak->kelas }}</p>
    </div>

    <div class="mb-4">
        <strong>Sekolah:</strong>
        <p>{{ $anak->sekolah }}</p>
    </div>

    <div class="mb-4">
        <strong>Nilai:</strong>
        <p>{{ $anak->nilai }}</p>
    </div>

    <a href="{{ route('anak.index') }}" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Kembali</a>
</div>
@endsection
