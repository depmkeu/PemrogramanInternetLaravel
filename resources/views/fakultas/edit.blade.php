<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Fakultas</title>
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
        <h3 class="text-center text-primary mb-4">Edit Fakultas</h3>

        <form method="POST" action="{{ route('fakultas.update', $fakultas->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Fakultas</label>
                <input type="text" name="nama_fakultas" class="form-control" value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-yellow">Perbarui</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
