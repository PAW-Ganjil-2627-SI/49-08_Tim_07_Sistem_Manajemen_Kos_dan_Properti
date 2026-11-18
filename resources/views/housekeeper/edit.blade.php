@extends('layouts.app')

@section('title', 'Edit Data Housekeeper')

@section('content')
<div class="top-header">
    <h1>Edit Data Housekeeper</h1>
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
    <form action="{{ route('housekeeper.update', $housekeeper->id_housekeeper) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
            <div>
                <label>Nama Staff</label>
                <input type="text" name="nama_staff" value="{{ old('nama_staff', $housekeeper->nama_staff) }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Tugas Kebersihan</label>
                <input type="text" name="tugas_kebersihan" value="{{ old('tugas_kebersihan', $housekeeper->tugas_kebersihan) }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Area Penanganan</label>
                <input type="text" name="area_penanganan" value="{{ old('area_penanganan', $housekeeper->area_penanganan) }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>No. HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $housekeeper->no_hp) }}" required style="width: 100%; padding: 8px;">
            </div>
        </div>
        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="submit" style="padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Update Data</button>
            <a href="{{ route('housekeeper.index') }}" style="padding: 10px 20px; background: #6b7280; color: white; text-decoration: none; border-radius: 4px;">Batal</a>
        </div>
    </form>
</div>
@endsection