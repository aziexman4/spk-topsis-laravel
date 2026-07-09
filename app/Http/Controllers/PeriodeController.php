<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index()
    {
        $periodes = Periode::orderBy('created_at', 'desc')->get();
        return view('periode.index', compact('periodes'));
    }

    public function create()
    {
        return view('periode.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_periode' => 'required|string|max:255|unique:periodes',
            'is_active' => 'boolean'
        ]);

        $isActive = $request->has('is_active');

        // Jika ini diset aktif, nonaktifkan yang lain
        if ($isActive) {
            Periode::where('is_active', true)->update(['is_active' => false]);
        }

        Periode::create([
            'nama_periode' => $request->nama_periode,
            'is_active' => $isActive
        ]);

        return redirect()->route('periode.index')->with('success', 'Gelombang perekrutan berhasil ditambahkan.');
    }

    public function edit(Periode $periode)
    {
        return view('periode.edit', compact('periode'));
    }

    public function update(Request $request, Periode $periode)
    {
        $request->validate([
            'nama_periode' => 'required|string|max:255|unique:periodes,nama_periode,' . $periode->id,
            'is_active' => 'boolean'
        ]);

        $isActive = $request->has('is_active');

        // Jika ini diset aktif, nonaktifkan yang lain
        if ($isActive) {
            Periode::where('id', '!=', $periode->id)->update(['is_active' => false]);
        }

        $periode->update([
            'nama_periode' => $request->nama_periode,
            'is_active' => $isActive
        ]);

        return redirect()->route('periode.index')->with('success', 'Gelombang perekrutan berhasil diperbarui.');
    }

    public function destroy(Periode $periode)
    {
        if ($periode->is_active) {
            return redirect()->route('periode.index')->with('error', 'Tidak dapat menghapus gelombang yang sedang aktif!');
        }
        
        $periode->delete();
        return redirect()->route('periode.index')->with('success', 'Gelombang perekrutan berhasil dihapus.');
    }

    public function setActive($id)
    {
        $periode = Periode::findOrFail($id);
        
        // Nonaktifkan semua
        Periode::where('is_active', true)->update(['is_active' => false]);
        
        // Aktifkan yang dipilih
        $periode->update(['is_active' => true]);

        return redirect()->route('periode.index')->with('success', 'Gelombang ' . $periode->nama_periode . ' berhasil diaktifkan.');
    }
}
