@extends('layouts.app')

@section('title', 'Modul Kamar - Sistem Manajemen Kos')

@section('content')
<div class="top-header">
    <h1>Modul Pengelolaan Kamar</h1>
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
    <h2>Tambah Data Kamar</h2>
    <form action="{{ route('kamar.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-top: 15px;">
            <div>
                <label>Nomor Kamar</label>
                <input type="text" name="nomor_kamar" value="{{ old('nomor_kamar') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Tipe Kamar</label>
                <input type="text" name="tipe" value="{{ old('tipe') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Harga (Rp)</label>
                <input type="number" name="harga" value="{{ old('harga') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Status</label>
                <select name="status" style="width: 100%; padding: 8px;">
                    <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Terisi" {{ old('status') == 'Terisi' ? 'selected' : '' }}>Terisi</option>
                    <option value="Perbaikan" {{ old('status') == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                </select>
            </div>
        </div>
        <button type="submit" style="margin-top: 15px; padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan Data Kamar</button>
    </form>
</div>

<div class="card">
    <h2>Daftar Kamar</h2>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 15px; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f3f4f6;">
                <th>ID</th>
                <th>Nomor Kamar</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kamar as $item)
                <tr>
                    <td>{{ $item->id_kamar }}</td>
                    <td>{{ $item->nomor_kamar }}</td>
                    <td>{{ $item->tipe }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->status }}</td>
                    <td style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                        <a href="{{ route('kamar.edit', $item->id_kamar) }}" style="padding: 6px 12px; background: #2563eb; color: white; border-radius: 4px; text-decoration: none; font-size: 0.875rem;">Edit</a>
                        <form action="{{ route('kamar.destroy', $item->id_kamar) }}" method="POST" onsubmit="return confirm('Hapus data kamar ini?')" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 6px 12px; background: #dc2626; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.875rem;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data kamar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection