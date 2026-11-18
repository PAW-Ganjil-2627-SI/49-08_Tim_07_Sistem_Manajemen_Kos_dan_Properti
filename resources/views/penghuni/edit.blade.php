@extends('layouts.app')

@section('title', 'Edit Data Penghuni')

@section('content')
<div class="top-header">
    <h1>Edit Data Penghuni</h1>
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
    <form action="{{ route('penghuni.update', $penghuni->id_penghuni) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
            <div>
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $penghuni->nama_lengkap) }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>No. KTP</label>
                <input type="text" name="no_ktp" value="{{ old('no_ktp', $penghuni->no_ktp) }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>No. HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $penghuni->no_hp) }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Asal Kota</label>
                <input type="text" name="asal_kota" value="{{ old('asal_kota', $penghuni->asal_kota) }}" required style="width: 100%; padding: 8px;">
            </div>
        </div>
        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="submit" style="padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Update Data</button>
            <a href="{{ route('penghuni.index') }}" style="padding: 10px 20px; background: #6b7280; color: white; text-decoration: none; border-radius: 4px;">Batal</a>
        </div>
    </form>
</div>
@endsection