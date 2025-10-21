@extends('layouts.app')

@section('title', 'Daftar Fakultas')
@section('header', 'Daftar Fakultas')

@section('content')
<a href="{{ route('fakultas.create') }}" class="btn btn-primary mb-3">+ Tambah Fakultas</a>

<table class="table table-bordered align-middle text-center">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nama Fakultas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($fakultas as $f)
        <tr>
            <td>{{ $f->id }}</td>
            <td>{{ $f->nama_fakultas }}</td>
            <td>
                <a href="{{ route('fakultas.edit', $f->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('fakultas.destroy', $f->id) }}" method="POST" style="display:inline"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4">Belum ada data fakultas.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
