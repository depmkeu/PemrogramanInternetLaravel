@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')
@section('header', 'Daftar Mahasiswa')

@section('content')
<a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a>

@php
    // Kelompokkan mahasiswa berdasarkan fakultas
    $grouped = $mahasiswas->groupBy(function($item) {
        return $item->programStudi->fakultas->nama_fakultas ?? 'Tanpa Fakultas';
    });
@endphp

@foreach($grouped as $fakultas => $mahasiswaList)
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white fw-bold">
        {{ $fakultas }}
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered align-middle text-center mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 5%">ID</th>
                    <th style="width: 15%">NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th style="width: 20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswaList as $m)
                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->nim }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->programStudi->nama_prodi ?? '-' }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endforeach

@if($mahasiswas->isEmpty())
    <div class="alert alert-info text-center">Belum ada data mahasiswa.</div>
@endif
@endsection
