<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        return view('alternatif.index', compact('alternatifs'));
    }

    public function create()
    {
        return view('alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_pelamar' => 'required']);
        Alternatif::create($request->all());
        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        return view('alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $request->validate(['nama_pelamar' => 'required']);
        $alternatif->update($request->all());
        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil diupdate.');
    }

    public function destroy($id)
    {
        Alternatif::findOrFail($id)->delete();
        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $request->validate(['status' => 'required|in:menunggu,lolos_administrasi,gugur']);
        $alternatif->update(['status' => $request->status]);
        
        $msg = $request->status == 'lolos_administrasi' ? 'diloloskan' : 'digugurkan';
        return redirect()->route('alternatif.index')->with('success', "Kandidat berhasil $msg seleksi administrasi.");
    }
}
