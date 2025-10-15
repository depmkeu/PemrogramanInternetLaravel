<!DOCTYPE html>
<html>
<head>
    <title>Menu Utama - Sistem Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            width: 400px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            margin-bottom: 30px;
            color: #333;
        }

        a {
            display: block;
            margin: 10px auto;
            width: 80%;
            padding: 12px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            color: white;
        }

        .btn-dummy {
            background-color: #17a2b8;
        }

        .btn-db {
            background-color: #28a745;
        }

        a:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🧑‍🎓 Halaman Profil Mahasiswa</h1>
        <a href="/mahasiswa-dummy" class="btn-dummy">Tanpa Database (Dummy)</a>
        <a href="/mahasiswa" class="btn-db">Dengan Database</a>
    </div>
</body>
</html>
