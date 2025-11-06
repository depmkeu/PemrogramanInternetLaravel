<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Fakultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(to right, #e0f2ff, #ffffff); }
        .card { border-radius: 15px; border: 1px solid #bee3f8; }
        .btn-yellow { background-color: #facc15; color: #1e3a8a; }
        .btn-yellow:hover { background-color: #eab308; color: #1e3a8a; }
        .table thead { background-color: #bfdbfe; color: #1e3a8a; }
        .table th, .table td { vertical-align: middle; }
    </style>
</head>
<body>
<div class="container py-5" style="max-width: 800px;">
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-primary mb-0">Data Fakultas</h3>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary mb-3">⬅️ Kembali ke Dashboard</a>
            <a href="{{ route('fakultas.create') }}" class="btn btn-yellow">+ Tambah Fakultas</a>
        </div>

        <table class="table table-bordered text-center">
            <thead>
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
                            <a href="{{ route('fakultas.edit', $f->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                            <form action="{{ route('fakultas.destroy', $f->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mb-1">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-secondary">Belum ada data fakultas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
