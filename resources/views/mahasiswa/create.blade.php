@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')
@section('header', 'Tambah Mahasiswa')

@section('content')
<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim') }}">
    </div>

    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
    </div>

    <div class="mb-3">
        <label for="fakultas_id" class="form-label">Fakultas</label>
        <select name="fakultas_id" id="fakultas_id" class="form-select">
            <option value="">-- Pilih Fakultas --</option>
            @foreach($fakultas as $f)
                <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="program_studi_id" class="form-label">Program Studi</label>
        <select name="program_studi_id" id="program_studi_id" class="form-select">
            <option value="">-- Pilih Program Studi --</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#fakultas_id').change(function() {
        var fakultas_id = $(this).val();
        $('#program_studi_id').html('<option value="">-- Pilih Program Studi --</option>');

        if(fakultas_id) {
            $.ajax({
                url: '/programstudi/fakultas/' + fakultas_id,
                type: 'GET',
                success: function(data) {
                    $.each(data, function(key, value) {
                        $('#program_studi_id').append('<option value="'+value.id+'">'+value.nama_prodi+'</option>');
                    });
                }
            });
        }
    });
});
</script>
@endsection
