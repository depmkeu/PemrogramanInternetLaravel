<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa (Tanpa Database)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background: #e8e8e8;
        }

        .btn {
            display: inline-block;
            padding: 6px 10px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn-add { background-color: #007bff; }
        .btn-edit { background-color: #28a745; }

        .alert {
            padding: 8px;
            border-radius: 4px;
            text-align: center;
            margin-bottom: 10px;
        }

        .success { background: #d4edda; color: #155724; }
        .error { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Mahasiswa (Tanpa Database)</h2>

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        <a href="/mahasiswa-dummy/create" class="btn btn-add">+ Tambah Mahasiswa</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
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
                            <a href="/mahasiswa-dummy/{{ $m['id'] }}/edit" class="btn btn-edit">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
