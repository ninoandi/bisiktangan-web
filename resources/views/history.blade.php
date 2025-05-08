<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: true }" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History - Bisik Tangan</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo bisik tangan.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        * {
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f5f7f8;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #0a1a4f;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar img {
            max-width: 150px;
            margin-bottom: 40px;
        }

        .nav-item {
            margin-bottom: 20px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            display: block;
        }

        .nav-item:hover {
            text-decoration: underline;
        }

        .main-content {
            flex: 1;
            padding: 40px;
            width: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .header h2 {
            font-size: 24px;
            color: #333;
        }

        .logout-btn {
            background: #e53e3e;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        .toggle-btn {
            background: #0a1a4f;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" :class="{ 'hidden': !sidebarOpen }">
        <div>
            <img src="{{ asset('assets/img/logo bisik tangan.png') }}" alt="Logo Bisik Tangan">
            <a href="{{ route('dashboard') }}" class="nav-item">Dashboard</a>
           <a href="{{ route('kamus') }}" class="nav-item">Kamus</a>
           <a href="{{ route('history') }}" class="nav-item">History</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <button @click="sidebarOpen = !sidebarOpen" class="toggle-btn">
                    ☰
                </button>
                <h2>{{ __('History') }}</h2>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Log out</button>
            </form>
        </div>

        <div class="card">
            <p>{{ __("Selamat Datang, ") }}{{ Auth::user()->name }}!</p>
        </div>
    </div>
</body>
</html>
