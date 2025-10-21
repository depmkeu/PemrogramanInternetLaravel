@extends('layouts.app')

@section('title', 'Tambah Mahasiswa Dummy')
@section('header', 'Tambah Mahasiswa (Tanpa Database)')

@section('content')
<div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-body">
        <form action="/mahasiswa-dummy" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Mahasiswa">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Prodi</label>
                <input type="text" name="prodi" class="form-control" placeholder="Masukkan Program Studi">
            </div>
            <div class="d-flex justify-content-end mt-3">
                <a href="/mahasiswa-dummy" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
