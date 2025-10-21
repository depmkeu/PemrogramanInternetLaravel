@extends('layouts.app')

@section('title', 'Edit Fakultas')
@section('header', 'Edit Fakultas')

@section('content')
<form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
        <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control"
               value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}">
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
