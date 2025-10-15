<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background: white;
            padding: 25px;
            border-radius: 8px;
            width: 80%;
            max-width: 700px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button, a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            font-size: 15px;
        }

        button {
            background-color: #2196F3;
        }

        button:hover {
            background-color: #1976D2;
        }

        a {
            background-color: #888;
            margin-left: 10px;
        }

        a:hover {
            background-color: #666;
        }

        .error {
            background-color: #ffe0e0;
            border: 1px solid #ff9b9b;
            color: #b30000;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            width: 80%;
            max-width: 700px;
            margin: 10px auto;
        }
    </style>
</head>
<body>

    <h2>Edit Mahasiswa</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $mahasiswa->nama) }}">

        <label for="prodi">Prodi:</label>
        <input type="text" name="prodi" id="prodi" value="{{ old('prodi', $mahasiswa->prodi) }}">

        <button type="submit">Perbarui</button>
        <a href="{{ route('mahasiswa.index') }}">Kembali</a>
    </form>

</body>
</html>
