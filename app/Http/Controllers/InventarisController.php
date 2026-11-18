<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::orderBy('id_inventaris', 'desc')->get();
        return view('inventaris.index', compact('inventaris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang'       => 'required|string|max:100',
            'kategori'          => 'required|string|max:50',
            'jumlah'            => 'required|integer|min:1',
            'kondisi'           => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi_penempatan' => 'required|string|max:100',
        ]);

        Inventaris::create($validated);

        return redirect()->route('inventaris.index')
                         ->with('success', 'Data Inventaris Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang'       => 'required|string|max:100',
            'kategori'          => 'required|string|max:50',
            'jumlah'            => 'required|integer|min:1',
            'kondisi'           => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi_penempatan' => 'required|string|max:100',
        ]);

        $inventaris = Inventaris::findOrFail($id);
        $inventaris->update($validated);

        return redirect()->route('inventaris.index')
                         ->with('success', 'Data Inventaris Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        Inventaris::destroy($id);

        return redirect()->route('inventaris.index')
                         ->with('success', 'Data Inventaris Berhasil Dihapus');
    }
}