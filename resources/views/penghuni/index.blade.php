@extends('layouts.app')

@section('title', 'Modul Penghuni - Sistem Manajemen Kos')

@section('content')
<div class="top-header">
    <h1>Modul Pengelolaan Penghuni</h1>
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
    <h2>Tambah Data Penghuni</h2>
    <form action="{{ route('penghuni.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-top: 15px;">
            <div>
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>No. KTP</label>
                <input type="text" name="no_ktp" value="{{ old('no_ktp') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>No. HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Asal Kota</label>
                <input type="text" name="asal_kota" value="{{ old('asal_kota') }}" required style="width: 100%; padding: 8px;">
            </div>
        </div>
        <button type="submit" style="margin-top: 15px; padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan Data Penghuni</button>
    </form>
</div>

<div class="card">
    <h2>Daftar Penghuni</h2>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 15px; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f3f4f6;">
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>No. KTP</th>
                <th>No. HP</th>
                <th>Asal Kota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($penghuni as $item)
                <tr>
                    <td>{{ $item->id_penghuni }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->no_ktp }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->asal_kota }}</td>
                    <td style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                        <a href="{{ route('penghuni.edit', $item->id_penghuni) }}" style="padding: 6px 12px; background: #2563eb; color: white; border-radius: 4px; text-decoration: none; font-size: 0.875rem;">Edit</a>
                        <form action="{{ route('penghuni.destroy', $item->id_penghuni) }}" method="POST" onsubmit="return confirm('Hapus data penghuni ini?')" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 6px 12px; background: #dc2626; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.875rem;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data penghuni.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection