<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e0f2ff, #ffffff);
        }
        .card {
            border-radius: 15px;
            border: 1px solid #bee3f8;
        }
        .table th {
            background-color: #2563eb;
            color: white;
            text-align: center;
        }
        .table td {
            text-align: center;
        }
        .fakultas-header {
            background-color: #bfdbfe;
            font-weight: 600;
            padding: 0.5rem;
        }
        .btn-yellow {
            background-color: #facc15;
            color: #1e3a8a;
        }
        .btn-yellow:hover {
            background-color: #eab308;
            color: #1e3a8a;
        }
        .btn-red {
            background-color: #dc2626;
            color: white;
        }
        .btn-red:hover {
            background-color: #b91c1c;
        }
        .btn-primary {
            background-color: #2563eb;
            border: none;
        }
        .btn-primary:hover {
            background-color: #1e40af;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h3 class="text-center text-primary mb-4">Daftar Program Studi</h3>
        <a href="{{ url('/dashboard') }}" class="btn btn-primary mb-3">⬅️ Kembali ke Dashboard</a>
        <a href="{{ route('programstudi.create') }}" class="btn btn-primary mb-3">+ Tambah Program Studi</a>

        @php
            $grouped = $programstudi->groupBy(fn($item) => $item->fakultas->nama_fakultas ?? 'Tanpa Fakultas');
        @endphp

        @foreach($grouped as $fakultas => $prodiList)
            <div class="mb-4 border rounded">
                <div class="fakultas-header">{{ $fakultas }}</div>
                <table class="table table-bordered mb-0">
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
                                    <a href="{{ route('programstudi.edit', $p->id) }}" class="btn btn-yellow btn-sm">Edit</a>
                                    <form action="{{ route('programstudi.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-red btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach

        @if($programstudi->isEmpty())
            <div class="text-center text-muted">Belum ada data program studi.</div>
        @endif
    </div>
</div>
</body>
</html>
