@extends('layouts.app')

@section('title', 'Modul Inventaris - Sistem Manajemen Kos')

@section('content')
<div class="top-header">
    <h1>Modul Pengelolaan Inventaris</h1>
</div>

@if (session('success'))
    <div style="padding: 12px 16px; background-color: #dcfce7; color: #166534; border: 1px solid #86efac; border-radius: 6px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div style="padding: 12px 16px; background-color: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; border-radius: 6px; margin-bottom: 20px;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card" style="margin-bottom: 20px;">
    <h2>Tambah Data Inventaris</h2>
    <form action="{{ route('inventaris.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-top: 15px;">
            <div>
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Jumlah</label>
                <input type="number" name="jumlah" value="{{ old('jumlah') }}" min="1" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Kondisi</label>
                <select name="kondisi" required style="width: 100%; padding: 8px;">
                    <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
            </div>
            <div>
                <label>Lokasi Penempatan</label>
                <input type="text" name="lokasi_penempatan" value="{{ old('lokasi_penempatan') }}" required style="width: 100%; padding: 8px;">
            </div>
        </div>
        <button type="submit" style="margin-top: 15px; padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan Data Inventaris</button>
    </form>
</div>

<div class="card">
    <h2>Daftar Inventaris</h2>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 15px; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f3f4f6;">
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inventaris as $item)
                <tr>
                    <td>{{ $item->id_inventaris }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->kondisi }}</td>
                    <td>{{ $item->lokasi_penempatan }}</td>
                    <td style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                        <a href="{{ route('inventaris.edit', $item->id_inventaris) }}" style="padding: 6px 12px; background: #2563eb; color: white; border-radius: 4px; text-decoration: none; font-size: 0.875rem;">Edit</a>
                        <form action="{{ route('inventaris.destroy', $item->id_inventaris) }}" method="POST" onsubmit="return confirm('Hapus data inventaris ini?')" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 6px 12px; background: #dc2626; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.875rem;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Belum ada data inventaris.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection