@extends('layouts.app')

@section('title', 'Daftar Mahasiswa Dummy')
@section('header', 'Daftar Mahasiswa (Tanpa Database)')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>Data Mahasiswa Dummy</h5>
        <a href="/mahasiswa-dummy/create" class="btn btn-primary">+ Tambah Mahasiswa</a>
    </div>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-secondary text-center">
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th width="90">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $m)
                <tr>
                    <td>{{ $m['id'] }}</td>
                    <td>{{ $m['nim'] }}</td>
                    <td>{{ $m['nama'] }}</td>
                    <td>{{ $m['prodi'] }}</td>
                    <td class="text-center">
                        <a href="/mahasiswa-dummy/{{ $m['id'] }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
