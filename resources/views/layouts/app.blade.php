<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistem Akademik')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f7f9fc;
            font-family: Arial, sans-serif;
            padding-top: 40px;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        h1 {
            color: #333;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
        }
        .btn { border-radius: 6px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>@yield('header')</h1>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')

        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="btn btn-secondary">Kembali ke Menu Utama</a>
        </div>
    </div>
    @yield('scripts')
</body>
</html>
