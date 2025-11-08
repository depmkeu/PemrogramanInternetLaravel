<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(to right, #e0f2ff, #ffffff); }
        .card { border-radius: 15px; border: 1px solid #bee3f8; }
        .btn-green { background-color: #22c55e; color: white; }
        .btn-green:hover { background-color: #16a34a; color: white; }
        .btn-yellow { background-color: #facc15; color: #1e3a8a; }
        .btn-yellow:hover { background-color: #eab308; color: #1e3a8a; }
        .btn-red { background-color: #ef4444; color: white; }
        .btn-red:hover { background-color: #dc2626; color: white; }
        .table thead, .table thead th { background-color: #2563eb !important; color: #e0f2fe !important; } 
        .table thead th { border-color: rgba(255,255,255,0.08); }
        .table td { vertical-align: middle; }
        .faculty-header { background: #1e1e1eef; color: #ffffff; font-weight: bold; text-align: center; border-radius: 10px 10px 0 0; padding: 10px; box-shadow: 0 2px 6px rgba(37, 99, 235, 0.3); }
    </style>
</head>
<body>
<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="font-weight: 500;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h3 class="text-primary fw-bold mb-0">Data Program Studi</h3>
            <div class="d-flex gap-2">
                <a href="{{ url('/dashboard') }}" class="btn btn-dark me-2">← Kembali ke Dashboard</a>
                <a href="{{ route('programstudi.create') }}" class="btn btn-green">+ Tambah Program Studi</a>
            </div>
        </div>

        @php
            $grouped = $programstudi->groupBy(fn($item) => $item->fakultas->nama_fakultas ?? 'Tanpa Fakultas');
        @endphp

        @foreach($grouped as $fakultas => $prodiList)
            <div class="mb-4 border rounded">
                <div class="faculty-header">{{ $fakultas }}</div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 text-center align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Prodi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prodiList as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->nama_prodi }}</td>
                                    <td>
                                        <a href="{{ route('programstudi.edit', $p->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                                        <form action="{{ route('programstudi.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-red btn-sm mb-1">Hapus</button>
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
            <div class="text-center text-primary fw-semibold mt-3">Belum ada data program studi.</div>
        @endif
    </div>
</div>
</body>
</html>
