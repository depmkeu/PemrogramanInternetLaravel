@extends('layouts.app')

@section('title', 'Edit Program Studi')
@section('header', 'Edit Program Studi')

@section('content')
<form action="{{ route('programstudi.update', $programstudi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nama_prodi" class="form-label">Nama Prodi</label>
        <input type="text" name="nama_prodi" id="nama_prodi" class="form-control"
               value="{{ old('nama_prodi', $programstudi->nama_prodi) }}">
    </div>

    <div class="mb-3">
        <label for="fakultas_id" class="form-label">Fakultas</label>
        <select name="fakultas_id" id="fakultas_id" class="form-select">
            @foreach($fakultas as $f)
                <option value="{{ $f->id }}" {{ $programstudi->fakultas_id == $f->id ? 'selected' : '' }}>
                    {{ $f->nama_fakultas }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('programstudi.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
