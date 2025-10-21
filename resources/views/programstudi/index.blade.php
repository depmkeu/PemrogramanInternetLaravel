@extends('layouts.app')

@section('title', 'Daftar Program Studi')
@section('header', 'Daftar Program Studi')

@section('content')
<a href="{{ route('programstudi.create') }}" class="btn btn-primary mb-3">+ Tambah Program Studi</a>

@php
    // Kelompokkan program studi berdasarkan fakultas
    $grouped = $programstudi->groupBy(function($item) {
        return $item->fakultas->nama_fakultas ?? 'Tanpa Fakultas';
    });
@endphp

@foreach($grouped as $fakultas => $prodiList)
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white fw-bold">
        {{ $fakultas }}
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered align-middle text-center mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 10%">ID</th>
                    <th>Nama Prodi</th>
                    <th style="width: 25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prodiList as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nama_prodi }}</td>
                    <td>
                        <a href="{{ route('programstudi.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('programstudi.destroy', $p->id) }}" method="POST" class="d-inline"
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

@if($programstudi->isEmpty())
    <div class="alert alert-info text-center">Belum ada data program studi.</div>
@endif
@endsection
