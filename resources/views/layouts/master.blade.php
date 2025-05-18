<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: true }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bisik Tangan')</title>

    <link rel="icon" href="{{ asset('assets/img/logo bisik tangan.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
            position: fixed; 
            height: 100vh;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        @media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
    }

    .sidebar.hidden {
        transform: translateX(-100%);
    }

    .sidebar:not(.hidden) {
        transform: translateX(0%);
    }
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

        /* Saat sidebar tersembunyi */
        .main-content.expanded {
        padding-left: 20 !important; /* saat sidebar disembunyikan */
        transition: margin-left 0.3s ease-in-out;
}

/* Saat sidebar tampil */
    .main-content.collapsed {
    margin-left: 220px;
    transition: margin-left 0.3s ease-in-out;
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

        /* Untuk layar kecil otomatis sidebar collapse */
        @media (max-width: 768px) {
         .main-content.collapsed {
         margin-left: 0 !important;
    }
}
    </style>
</head>
<body x-data="{ sidebarOpen: true }">

    {{-- Sidebar --}}
    <div class="sidebar" :class="{ 'hidden': !sidebarOpen }">
        <div>
            <img src="{{ asset('assets/img/logo bisik tangan.png') }}" alt="Logo Bisik Tangan">
            <div class="nav-item dropdown">
                <a href="#" class="nav-item" onclick="toggleDropdown('kamusSubmenu')">Kamus ▾</a>
                <div id="kamusSubmenu" style="display: none; margin-left: 15px;">
                    <a href="{{ route('kamus.alphabet') }}" class="nav-item">Alphabet</a>
                    <a href="{{ route('kamus.katatanya') }}" class="nav-item">Kata Tanya</a>
                    <a href="{{ route('kamus.katakerja') }}" class="nav-item">Kata Kerja</a>
                    <a href="{{ route('kamus.katasifat') }}" class="nav-item">Kata Sifat</a>
                </div>
            </div>
            <a href="{{ route('history') }}" class="nav-item">History</a>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="main-content" :class="sidebarOpen ? 'collapsed' : 'expanded'">
        <div class="header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <button @click="sidebarOpen = !sidebarOpen" class="toggle-btn">☰</button>
                <h2>@yield('header')</h2>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Log out</button>
            </form>
        </div>

        {{-- Tempat konten utama --}}
        @yield('content')
    </div>

    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.style.display = dropdown.style.display === "none" || dropdown.style.display === "" ? "block" : "none";
        }
    </script>
</body>
</html>

