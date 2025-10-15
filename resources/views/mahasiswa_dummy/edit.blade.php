<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa (Dummy)</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
            padding: 40px;
        }

        form {
            background: white;
            width: 400px;
            margin: auto;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type=text] {
            width: 100%;
            padding: 8px;
            margin: 6px 0 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button, a {
            display: inline-block;
            padding: 8px 14px;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        button { background-color: #2196F3; }
        a { background-color: #777; }
    </style>
</head>
<body>
    <form action="/mahasiswa-dummy/{{ $m['id'] }}" method="POST">
        @csrf
        <h2>Edit Mahasiswa</h2>

        <label>NIM:</label>
        <input type="text" name="nim" value="{{ $m['nim'] }}">

        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $m['nama'] }}">

        <label>Prodi:</label>
        <input type="text" name="prodi" value="{{ $m['prodi'] }}">

        <button type="submit">Perbarui</button>
        <a href="/mahasiswa-dummy">Kembali</a>
    </form>
</body>
</html>
