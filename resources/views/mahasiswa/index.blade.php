<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
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
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-primary mb-0">Data Mahasiswa</h3>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-dark me-2">← Kembali ke Dashboard</a>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-yellow">+ Tambah Mahasiswa</a>
            </div>
        </div>

        @php
            $grouped = $mahasiswas->groupBy(fn($item) => $item->programStudi->fakultas->nama_fakultas ?? 'Tanpa Fakultas');
        @endphp

        @foreach($grouped as $fakultas => $mahasiswaList)
            <div class="mb-4 border rounded">
                <div class="bg-primary text-white px-3 py-2 fw-semibold">{{ $fakultas }}</div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Program Studi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mahasiswaList as $m)
                                <tr>
                                    <td>{{ $m->id }}</td>
                                    <td>{{ $m->nim }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->programStudi->nama_prodi ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                                        <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mb-1">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

        @if($mahasiswas->isEmpty())
            <div class="text-center text-primary fw-semibold mt-3">Belum ada data mahasiswa.</div>
        @endif
    </div>
</div>
</body>
</html>
