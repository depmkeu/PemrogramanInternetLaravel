@extends('layouts.app')

@section('title', 'Menu Utama')
@section('header', 'Menu Utama - Sistem Mahasiswa')

@section('content')
<div class="text-center">
    <p class="mb-4">Pilih menu di bawah untuk melanjutkan:</p>

    <a href="/mahasiswa" class="btn btn-success btn-lg mb-3 w-50">📘 Data Mahasiswa (Database)</a><br>
    <a href="/fakultas" class="btn btn-primary btn-lg mb-3 w-50">🏛️ Data Fakultas</a><br>
    <a href="/programstudi" class="btn btn-info btn-lg mb-3 w-50 text-white">🎓 Data Program Studi</a><br>

    <hr class="my-4">
    <a href="/mahasiswa-dummy" class="btn btn-secondary btn-sm">Versi Dummy (Tanpa Database)</a>
</div>
@endsection
