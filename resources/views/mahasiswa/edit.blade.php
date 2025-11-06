<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(to right, #e0f2ff, #ffffff); }
        .card { border-radius: 15px; border: 1px solid #bee3f8; }
        .btn-yellow { background-color: #facc15; color: #1e3a8a; }
        .btn-yellow:hover { background-color: #eab308; color: #1e3a8a; }
        .form-label { color: #1d4ed8; font-weight: 600; }
    </style>
</head>
<body>
<div class="container py-5" style="max-width: 600px;">
    <div class="card shadow-sm p-4">
        <h3 class="text-center text-primary mb-4">Edit Mahasiswa</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <select name="program_studi_id" class="form-select">
                    <option value="">-- Pilih Program Studi --</option>
                    @foreach($programstudi as $p)
                        <option value="{{ $p->id }}" {{ old('program_studi_id', $mahasiswa->program_studi_id) == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_prodi }} ({{ $p->fakultas->nama_fakultas }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-yellow">Perbarui</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
