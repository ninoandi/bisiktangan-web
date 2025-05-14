<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: true }" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kata Sifat - Bisik Tangan</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo bisik tangan.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            {{-- Kamus Dropdown --}}
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

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <button @click="sidebarOpen = !sidebarOpen" class="toggle-btn">
                    ☰
                </button>
                <h2>{{ __('Kata Sifat') }}</h2>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Log out</button>
            </form>
        </div>

        <div class="card">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>
    <table style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: #f0f0f0;">
            <tr>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">No</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Judul</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Deskripsi</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Video</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
            </tr>
       <!-- Awal Modal Tambah -->
       <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false"
       tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Kata Sifat</h1>
                   <button type="button" class="btn-close" data-bs-dismiss="modal"
                       aria-label="Close"></button>
               </div>

                   <form method="POST" action="{{ route('katasifat.store') }}" enctype="multipart/form-data">     
                       @csrf
                   <div class="modal-body">

                       <div class="mb-3">
                           <label class="form-label">Judul</label>
                           <input type="text" class="form-control" name="judul"
                               placeholder="Masukkan Judul!" required>
                       </div>


                       <div class="mb-3">
                               <label class="form-label">Deskripsi Video</label>
                               <input type="text" class="form-control" name="deskripsi"
                                   placeholder="Masukkan Deskripsi Video!"
                                   required>
                           </div>

                       <div class="mb-3">
                               <label class="form-label">Video</label>
                               <input type="file" class="form-control" name="video_url" accept="video/*" required>
                       </div>

                       <div class="modal-footer">
                           <button type="submit" class="btn btn-primary"
                               name="bsimpanalphabet">Simpan</button>
                           <button type="button" class="btn btn-danger"
                               data-bs-dismiss="modal">Keluar</button>
                       </div>
               </form>
           </div>
       </div>
   </div>
   <!-- Akhir Modal Tambah -->
</thead>
<tbody>
@forelse ($katasifat as $index => $item)
<tr>
<td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $index + 1 }}</td>
<td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $item->judul }}</td>
<td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $item->deskripsi }}</td>
<td>
   <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal{{ $item->id }}">
       Lihat Video
   </button>

   <!-- Modal -->
   <div class="modal fade" id="videoModal{{ $item->id }}" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Video Kata Sifat</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body text-center">
                   <video width="50%" controls>
                       <source src="{{ asset('storage/' . $item->video_url) }}" type="video/mp4">
                       Browser tidak mendukung video.
                   </video>
               </div>
           </div>
       </div>
   </div>
</td>

<td style="padding: 12px; border-bottom: 1px solid #ddd;">
   <!-- Tombol Edit -->
<button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
Edit
</button>

<!-- Modal Edit -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<form action="{{ route('katasifat.update', $item->id) }}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('PUT')
   <div class="modal-header">
       <h5 class="modal-title" id="editModalLabel">Edit Data Kata Sifat</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>

   <div class="modal-body">
       <div class="mb-3">
           <label class="form-label">Judul</label>
           <input type="text" class="form-control" name="judul" value="{{ $item->judul }}" required>
       </div>

       <div class="mb-3">
           <label class="form-label">Deskripsi</label>
           <input type="text" class="form-control" name="deskripsi" value="{{ $item->deskripsi }}" required>
       </div>

       <div class="mb-3">
           <label class="form-label">Ganti Video (opsional)</label>
           <input type="file" class="form-control" name="video_url" accept="video/*">
           <small class="text-muted">Kosongkan jika tidak ingin mengubah video.</small>
       </div>
   </div>

   <div class="modal-footer">
       <button type="submit" class="btn btn-success">Simpan Perubahan</button>
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
   </div>
</form>
</div>
</div>
</div><!-- Akhir Modal Edit -->

<!-- Tombol Hapus -->
<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item->id }}">
Hapus
</button>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $item->id }}" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-danger text-white">
<h5 class="modal-title" id="hapusModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
Apakah kamu yakin ingin menghapus <strong>{{ $item->judul }}</strong>?
</div>
<div class="modal-footer">
<form action="{{ route('katasifat.destroy', $item->id) }}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Ya, Hapus</button>
</form>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
</div>
</div>
</div>
</div>

</td>
</tr>
@empty
<tr>
<td colspan="4" style="padding: 12px; text-align: center;">Tidak ada data.</td>
</tr>
@endforelse
</tbody>

</table>
</div>


    <script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        if (dropdown.style.display === "none" || dropdown.style.display === "") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



