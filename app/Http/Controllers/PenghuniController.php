<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghuni = Penghuni::orderBy('id_penghuni', 'desc')->get();
        return view('penghuni.index', compact('penghuni'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'no_ktp'       => 'required|string|max:20|unique:penghuni,no_ktp',
            'no_hp'        => 'required|string|max:20',
            'asal_kota'    => 'required|string|max:100',
        ]);

        Penghuni::create($validated);

        return redirect()->route('penghuni.index')
                         ->with('success', 'Data Penghuni Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        return view('penghuni.edit', compact('penghuni'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'no_ktp'       => 'required|string|max:20|unique:penghuni,no_ktp,' . $id . ',id_penghuni',
            'no_hp'        => 'required|string|max:20',
            'asal_kota'    => 'required|string|max:100',
        ]);

        $penghuni = Penghuni::findOrFail($id);
        $penghuni->update($validated);

        return redirect()->route('penghuni.index')
                         ->with('success', 'Data Penghuni Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        Penghuni::destroy($id);

        return redirect()->route('penghuni.index')
                         ->with('success', 'Data Penghuni Berhasil Dihapus');
    }
}