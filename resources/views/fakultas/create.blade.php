@extends('layouts.app')

@section('title', 'Tambah Fakultas')
@section('header', 'Tambah Fakultas')

@section('content')
<form action="{{ route('fakultas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
        <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control" value="{{ old('nama_fakultas') }}">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
