<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Fakultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(to right, #e0f2ff, #ffffff); }
        .card { border-radius: 15px; border: 1px solid #bee3f8; }
        .btn-green { background-color: #22c55e; color: white; }
        .btn-green:hover { background-color: #16a34a; color: white; }
        .btn-yellow { background-color: #facc15; color: #1e3a8a; }
        .btn-yellow:hover { background-color: #eab308; color: #1e3a8a; }
        .table thead, .table thead th { background-color: #2563eb !important; color: #e0f2fe !important; } 
        .table thead th { border-color: rgba(255,255,255,0.08); }
        .table td { vertical-align: middle; }
    </style>
</head>
<body>
<div class="container py-5" style="max-width: 900px;">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm" role="alert" 
            style="background-color: #d1fae5; color: #065f46; border-left: 5px solid #10b981; font-weight: 500;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h3 class="text-primary fw-bold mb-0">Data Fakultas</h3>
            <div class="d-flex gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-dark me-2">← Kembali ke Dashboard</a>
                <a href="{{ route('fakultas.create') }}" class="btn btn-green">+ Tambah Fakultas</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
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
                            <td colspan="3" class="text-secondary">Belum ada data fakultas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
