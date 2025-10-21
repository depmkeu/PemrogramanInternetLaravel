@extends('layouts.app')

@section('title', 'Tambah Program Studi')
@section('header', 'Tambah Program Studi')

@section('content')
<form action="{{ route('programstudi.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nama_prodi" class="form-label">Nama Prodi</label>
        <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="{{ old('nama_prodi') }}">
    </div>

    <div class="mb-3">
        <label for="fakultas_id" class="form-label">Fakultas</label>
        <select name="fakultas_id" id="fakultas_id" class="form-select">
            <option value="">-- Pilih Fakultas --</option>
            @foreach($fakultas as $f)
                <option value="{{ $f->id }}" {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>
                    {{ $f->nama_fakultas }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('programstudi.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
