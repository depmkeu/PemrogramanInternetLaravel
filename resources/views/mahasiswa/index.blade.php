<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
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
        .faculty-header { background: #1e1e1eef; color: #ffffff; font-weight: bold; text-align: center; border-radius: 10px 10px 0 0; padding: 10px; box-shadow: 0 2px 6px rgba(37, 99, 235, 0.3); }
    </style>
</head>
<body>
<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-primary fw-bold mb-0">Data Mahasiswa</h3>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-dark me-2">← Kembali ke Dashboard</a>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-green">+ Tambah Mahasiswa</a>
            </div>
        </div>

        @php
            $grouped = $mahasiswas->groupBy(fn($item) => $item->programStudi->fakultas->nama_fakultas ?? 'Tanpa Fakultas');
        @endphp

        @foreach($grouped as $fakultas => $mahasiswaList)
            <div class="mb-4 border rounded">
                <div class="faculty-header text-center fw-semibold py-2">{{ $fakultas }}</div>
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
