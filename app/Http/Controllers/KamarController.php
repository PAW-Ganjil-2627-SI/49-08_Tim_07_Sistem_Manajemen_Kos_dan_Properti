<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::orderBy('id_kamar', 'desc')->get();
        return view('kamar.index', compact('kamar'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_kamar' => 'required|string|max:20|unique:kamar,nomor_kamar',
            'tipe'        => 'required|string|max:50',
            'harga'       => 'required|numeric|min:0',
            'status'      => 'required|in:Tersedia,Terisi,Perbaikan',
        ]);

        Kamar::create($validated);

        return redirect()->route('kamar.index')
                         ->with('success', 'Data Kamar Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nomor_kamar' => 'required|string|max:20|unique:kamar,nomor_kamar,' . $id . ',id_kamar',
            'tipe'        => 'required|string|max:50',
            'harga'       => 'required|numeric|min:0',
            'status'      => 'required|in:Tersedia,Terisi,Perbaikan',
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->update($validated);

        return redirect()->route('kamar.index')
                         ->with('success', 'Data Kamar Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        Kamar::destroy($id);

        return redirect()->route('kamar.index')
                         ->with('success', 'Data Kamar Berhasil Dihapus');
    }
}