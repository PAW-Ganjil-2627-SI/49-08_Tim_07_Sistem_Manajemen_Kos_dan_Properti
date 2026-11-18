@extends('layouts.app')

@section('title', 'Edit Data Inventaris')

@section('content')
<div class="top-header">
    <h1>Edit Data Inventaris</h1>
</div>

@if ($errors->any())
    <div style="padding: 12px 16px; background-color: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; border-radius: 6px; margin-bottom: 20px;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <form action="{{ route('inventaris.update', $inventaris->id_inventaris) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
            <div>
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $inventaris->nama_barang) }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $inventaris->kategori) }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Jumlah</label>
                <input type="number" name="jumlah" value="{{ old('jumlah', $inventaris->jumlah) }}" min="1" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Kondisi</label>
                <select name="kondisi" required style="width: 100%; padding: 8px;">
                    <option value="Baik" {{ old('kondisi', $inventaris->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak Ringan" {{ old('kondisi', $inventaris->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ old('kondisi', $inventaris->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
            </div>
            <div>
                <label>Lokasi Penempatan</label>
                <input type="text" name="lokasi_penempatan" value="{{ old('lokasi_penempatan', $inventaris->lokasi_penempatan) }}" required style="width: 100%; padding: 8px;">
            </div>
        </div>
        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="submit" style="padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Update Data</button>
            <a href="{{ route('inventaris.index') }}" style="padding: 10px 20px; background: #6b7280; color: white; text-decoration: none; border-radius: 4px;">Batal</a>
        </div>
    </form>
</div>
@endsection