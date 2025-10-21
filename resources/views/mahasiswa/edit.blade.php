@extends('layouts.app')

@section('title', 'Edit Mahasiswa')
@section('header', 'Edit Mahasiswa')

@section('content')
<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}">
    </div>

    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}">
    </div>

    <div class="mb-3">
        <label for="program_studi_id" class="form-label">Program Studi</label>
        <select name="program_studi_id" id="program_studi_id" class="form-select">
            <option value="">-- Pilih Program Studi --</option>
            @foreach($programstudi as $p)
                <option value="{{ $p->id }}" {{ old('program_studi_id', $mahasiswa->program_studi_id) == $p->id ? 'selected' : '' }}>
                    {{ $p->nama_prodi }} ({{ $p->fakultas->nama_fakultas }})
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
