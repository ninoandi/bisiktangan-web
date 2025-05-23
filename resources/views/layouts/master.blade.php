<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: true }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bisik Tangan')</title>

    <link rel="icon" href="{{ asset('assets/img/logo bisik tangan.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            display: flex;
            align-items: center;
        }

        .nav-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .nav-item:hover {
            text-decoration: underline;
        }

        .submenu-item {
            margin-bottom: 15px;
            margin-left: 30px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .submenu-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .submenu-item:hover {
            text-decoration: underline;
        }

        .main-content {
            flex: 1;
            padding: 0;
            width: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

    .header h2 {
            font-size: 2.8rem; /* Bikin lebih besar */
            color: #0a1a4f; /* Ganti warna ke navy blue yang matching sidebar */
            margin: 0;
            font-weight: 700; /* Lebih tebal */
            letter-spacing: 2px; /* Jarak antar huruf */
             text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1); /* Shadow tipis supaya lebih hidup */
            font-family: 'Poppins', sans-serif; /* Ganti font (pastikan sudah di-import jika mau font ini) */
            transition: color 0.3s ease-in-out;
}

/* Hover efek supaya header interaktif */
    .header h2:hover {
            color: #1e40af; /* Biru lebih terang saat hover */
            cursor: default;
            text-shadow: 2px 2px 5px rgba(30, 64, 175, 0.4);
}


        .content-container {
            padding: 0 40px 40px 40px;
        }

        /* Saat sidebar tersembunyi */
        .main-content.expanded {
            padding-left: 20px !important; /* saat sidebar disembunyikan */
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
            display: flex;
            align-items: center;
        }

        .logout-btn i {
            margin-right: 8px;
        }

        .toggle-btn {
            background: #0a1a4f;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            margin-right: 15px;
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
            <a href="{{ route('dashboard') }}" class="nav-item">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="#" class="nav-item" onclick="toggleDropdown('kamusSubmenu')">
                <i class="fas fa-book"></i> Kamus <i class="fas fa-chevron-down" style="margin-left: 5px;"></i>
            </a>
            <div id="kamusSubmenu" style="display: none;">
                <a href="{{ route('kamus.alphabet') }}" class="submenu-item">
                    <i class="fas fa-font"></i> Alphabet
                </a>
                <a href="{{ route('kamus.katatanya') }}" class="submenu-item">
                    <i class="fas fa-question-circle"></i> Kata Tanya
                </a>
                <a href="{{ route('kamus.katakerja') }}" class="submenu-item">
                    <i class="fas fa-running"></i> Kata Kerja
                </a>
                <a href="{{ route('kamus.katasifat') }}" class="submenu-item">
                    <i class="fas fa-star"></i> Kata Sifat
                </a>
            </div>
            <a href="{{ route('history') }}" class="nav-item">
                <i class="fas fa-history"></i> History
            </a>
            <a href="{{ route('informasi') }}" class="nav-item">
                <i class="fas fa-info-circle"></i></i> Informasi
            </a>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="main-content" :class="sidebarOpen ? 'collapsed' : 'expanded'">
        <div class="header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <button @click="sidebarOpen = !sidebarOpen" class="toggle-btn">
                    <i class="fas fa-bars"></i>
                </button>
                <h2>@yield('header')</h2>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Log out
                </button>
            </form>
        </div>

        {{-- Tempat konten utama --}}
        <div class="content-container">
            @yield('content')
        </div>
    </div>

    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.style.display = dropdown.style.display === "none" || dropdown.style.display === "" ? "block" : "none";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 