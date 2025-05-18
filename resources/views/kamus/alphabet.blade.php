@extends('layouts.master')

@section('title', 'Alphabet')

@section('header', 'Alphabet')

@section('content')
        <div class="card">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>
    <table style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: #f0f0f0;">
            <tr>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">No</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Judul</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Deskripsi</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Foto</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Video</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
            </tr>
            <!-- Awal Modal Tambah -->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Alphabet</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                                <form method="POST" action="{{ route('alphabet.store') }}" enctype="multipart/form-data">     
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
                                            <label class="form-label">Foto</label>
                                            <input type="file" class="form-control" name="gambar" accept="image/*" required>
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
    @forelse ($alphabet as $index => $item)
        <tr>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $index + 1 }}</td>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $item->judul }}</td>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $item->deskripsi }}</td>
            <td>
                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#fotoModal{{ $item->id }}">
                    Lihat Foto
                </button>
                <!-- Modal Lihat Foto -->
<div class="modal fade" id="fotoModal{{ $item->id }}" tabindex="-1" aria-labelledby="fotoModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="fotoModalLabel{{ $item->id }}">Foto - {{ $item->judul }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body text-center">
          @if($item->gambar)
              <img src="{{ asset('storage/' . $item->gambar) }}" alt="Foto {{ $item->judul }}" class="img-fluid rounded">
          @else
              <p>Foto tidak tersedia.</p>
          @endif
        </div>
      </div>
    </div>
  </div>
  
            </td>
            <td>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal{{ $item->id }}">
                    Lihat Video
                </button>
                <!-- Modal -->
                <div class="modal fade" id="videoModal{{ $item->id }}" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Video Alphabet</h5>
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
            <form action="{{ route('alphabet.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Alphabet</h5>
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
                        <label class="form-label">Ganti Foto (opsional)</label>
                        <input type="file" class="form-control" name="gambar" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
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
        <form action="{{ route('alphabet.destroy', $item->id) }}" method="POST">
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
@endsection
