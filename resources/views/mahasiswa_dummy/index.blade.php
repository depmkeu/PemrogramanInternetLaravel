<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa (Dummy)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(to right, #e0f2ff, #ffffff); }
        .container { margin-top: 50px; }
        .card { border-radius: 15px; border: 1px solid #cbe6ff; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .btn-primary { background-color: #2563eb; border: none; }
        .btn-primary:hover { background-color: #1d4ed8; }
        .btn-warning { background-color: #facc15; color: #1e3a8a; border: none; }
        .btn-warning:hover { background-color: #fcd34d; }
        .table th { background-color: #2563eb; color: white; }
    </style>
</head>
<body>
<div class="container">
    <div class="card p-4">
        <h3 class="mb-4 text-center text-primary">Data Mahasiswa (Dummy)</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="/mahasiswa-dummy/create" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
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
                    @foreach($mahasiswa as $m)
                    <tr>
                        <td>{{ $m['id'] }}</td>
                        <td>{{ $m['nim'] }}</td>
                        <td>{{ $m['nama'] }}</td>
                        <td>{{ $m['prodi'] }}</td>
                        <td>
                            <a href="/mahasiswa-dummy/{{ $m['id'] }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
