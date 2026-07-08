<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::orderBy('kode', 'asc')->get();
        $totalBobot = Kriteria::sum('bobot');
        return view('kriteria.index', compact('kriterias', 'totalBobot'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:kriterias,kode',
            'nama' => 'required',
            'bobot' => 'required|numeric',
            'tipe' => 'required|in:benefit,cost'
        ]);

        Kriteria::create($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $request->validate([
            'kode' => 'required|unique:kriterias,kode,'.$id,
            'nama' => 'required',
            'bobot' => 'required|numeric',
            'tipe' => 'required|in:benefit,cost'
        ]);

        $kriteria->update($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diupdate.');
    }

    public function destroy($id)
    {
        Kriteria::findOrFail($id)->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
