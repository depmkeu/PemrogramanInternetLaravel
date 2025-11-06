<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa (Dummy)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(to right, #e0f2ff, #ffffff); }
        .container { margin-top: 50px; max-width: 600px; }
        .card { border-radius: 15px; border: 1px solid #cbe6ff; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .form-control:focus { border-color: #60a5fa; box-shadow: 0 0 0 0.2rem rgba(96,165,250,0.25); }
        .btn-primary { background-color: #2563eb; border: none; }
        .btn-primary:hover { background-color: #1d4ed8; }
        .btn-warning { background-color: #facc15; color: #1e3a8a; border: none; }
        .btn-warning:hover { background-color: #fcd34d; }
        label { font-weight: 600; color: #1e3a8a; }
    </style>
</head>
<body>
<div class="container">
    <div class="card p-4">
        <h3 class="text-center text-primary mb-4">Edit Mahasiswa (Dummy)</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/mahasiswa-dummy/{{ $m['id'] }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ $m['nim'] }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $m['nama'] }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <input type="text" name="prodi" class="form-control" value="{{ $m['prodi'] }}" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="/mahasiswa-dummy" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
