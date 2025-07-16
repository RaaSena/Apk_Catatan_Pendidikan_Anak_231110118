<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $data = Anak::when($keyword, function ($query, $keyword) {
                return $query->where('nama', 'like', "%{$keyword}%")
                             ->orWhere('sekolah', 'like', "%{$keyword}%")
                             ->orWhere('kelas', 'like', "%{$keyword}%");
            })
            ->latest()
            ->paginate(10);

        return view('anak.index', compact('data', 'keyword'));
    }

    public function create()
    {
        return view('anak.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'umur' => 'required|integer|min:1',
            'kelas' => 'required|string|max:50',
            'sekolah' => 'required|string|max:100',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        Anak::create($validated);

        return redirect()->route('anak.index')->with('success', 'Data anak berhasil disimpan!');
    }

    public function edit($id)
    {
        $anak = Anak::findOrFail($id);
        return view('anak.edit', compact('anak'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'umur' => 'required|integer|min:1',
            'kelas' => 'required|string|max:50',
            'sekolah' => 'required|string|max:100',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        $anak = Anak::findOrFail($id);
        $anak->update($validated);

        return redirect()->route('anak.index')->with('success', 'Data anak berhasil diupdate!');
    }

    public function destroy($id)
    {
        $anak = Anak::findOrFail($id);
        $anak->delete();

        return redirect()->route('anak.index')->with('success', 'Data anak berhasil dihapus!');
    }

    public function show($id)
    {
        $anak = Anak::findOrFail($id);
        return view('anak.show', compact('anak'));
    }

    public function dashboard()
    {   
        $totalAnak = Anak::count();
        $totalSekolah = Anak::distinct('sekolah')->count('sekolah');
        $rataRataNilai = Anak::avg('nilai');

        // Data untuk grafik
        $labels = Anak::pluck('nama');
        $nilai = Anak::pluck('nilai');

        return view('anak.dashboard', compact('totalAnak', 'totalSekolah', 'rataRataNilai', 'labels', 'nilai'));
    }


}
