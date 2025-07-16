@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Pendidikan Anak</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded shadow p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-700">Total Anak</h2>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalAnak }}</p>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-700">Total Sekolah</h2>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalSekolah }}</p>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-700">Rata-rata Nilai</h2>
            <p class="text-3xl font-bold text-purple-600 mt-2">{{ number_format($rataRataNilai, 2) }}</p>
        </div>
    </div>

    {{-- Grafik Nilai Anak --}}
    <div class="bg-white mt-8 p-6 rounded shadow">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Grafik Nilai Anak</h2>
        <canvas id="nilaiChart" height="100"></canvas>
    </div>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('nilaiChart').getContext('2d');
    const nilaiChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Nilai Anak',
                data: {!! json_encode($nilai) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>
@endsection
