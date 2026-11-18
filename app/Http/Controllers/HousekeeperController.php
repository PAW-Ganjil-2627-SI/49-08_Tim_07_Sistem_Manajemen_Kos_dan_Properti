<?php

namespace App\Http\Controllers;

use App\Models\Housekeeper;
use Illuminate\Http\Request;

class HousekeeperController extends Controller
{
    public function index()
    {
        $housekeeper = Housekeeper::orderBy('id_housekeeper', 'desc')->get();
        return view('housekeeper.index', compact('housekeeper'));
    }

    public function store(Request $request)
    {
        $validated =$request->validate([
            'nama_staff'       => 'required|string|max:100',
            'tugas_kebersihan' => 'required|string|max:150',
            'area_penanganan'  => 'required|string|max:100',
            'no_hp'            => 'required|string|max:20',
        ]);

        Housekeeper::create($validated);

        return redirect()->route('housekeeper.index')
                         ->with('success', 'Data Housekeeper Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $housekeeper = Housekeeper::findOrFail($id);
        return view('housekeeper.edit', compact('housekeeper'));
    }

    public function update(Request $request,$id)
    {
        $validated =$request->validate([
            'nama_staff'       => 'required|string|max:100',
            'tugas_kebersihan' => 'required|string|max:150',
            'area_penanganan'  => 'required|string|max:100',
            'no_hp'            => 'required|string|max:20',
        ]);

        $housekeeper = Housekeeper::findOrFail($id);
        $housekeeper->update($validated);

        return redirect()->route('housekeeper.index')
                         ->with('success', 'Data Housekeeper Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        Housekeeper::destroy($id);

        return redirect()->route('housekeeper.index')
                         ->with('success', 'Data Housekeeper Berhasil Dihapus');
    }
}