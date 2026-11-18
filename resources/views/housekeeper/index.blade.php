@extends('layouts.app')

@section('title', 'Modul Housekeeper - Sistem Manajemen Kos')

@section('content')
<div class="top-header">
    <h1>Modul Pengelolaan Housekeeper</h1>
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
    <h2>Tambah Data Housekeeper</h2>
    <form action="{{ route('housekeeper.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-top: 15px;">
            <div>
                <label>Nama Staff</label>
                <input type="text" name="nama_staff" value="{{ old('nama_staff') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Tugas Kebersihan</label>
                <input type="text" name="tugas_kebersihan" value="{{ old('tugas_kebersihan') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Area Penanganan</label>
                <input type="text" name="area_penanganan" value="{{ old('area_penanganan') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" required style="width: 100%; padding: 8px;">
            </div>
        </div>
        <button type="submit" style="margin-top: 15px; padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan Data Housekeeper</button>
    </form>
</div>

<div class="card">
    <h2>Daftar Housekeeper</h2>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 15px; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f3f4f6;">
                <th>ID</th>
                <th>Nama Staff</th>
                <th>Tugas Kebersihan</th>
                <th>Area Penanganan</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($housekeeper as $item)
                <tr>
                    <td>{{ $item->id_housekeeper }}</td>
                    <td>{{ $item->nama_staff }}</td>
                    <td>{{ $item->tugas_kebersihan }}</td>
                    <td>{{ $item->area_penanganan }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                        <a href="{{ route('housekeeper.edit', $item->id_housekeeper) }}" style="padding: 6px 12px; background: #2563eb; color: white; border-radius: 4px; text-decoration: none; font-size: 0.875rem;">Edit</a>
                        <form action="{{ route('housekeeper.destroy', $item->id_housekeeper) }}" method="POST" onsubmit="return confirm('Hapus data housekeeper ini?')" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 6px 12px; background: #dc2626; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.875rem;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data housekeeper.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection