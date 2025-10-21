@extends('layouts.app')

@section('title', 'Edit Mahasiswa Dummy')
@section('header', 'Edit Mahasiswa (Tanpa Database)')

@section('content')
<div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-body">
        <form action="/mahasiswa-dummy/{{ $m['id'] }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">NIM</label>
                <input type="text" name="nim" value="{{ $m['nim'] }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <input type="text" name="nama" value="{{ $m['nama'] }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Prodi</label>
                <input type="text" name="prodi" value="{{ $m['prodi'] }}" class="form-control">
            </div>
            <div class="d-flex justify-content-end mt-3">
                <a href="/mahasiswa-dummy" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection
