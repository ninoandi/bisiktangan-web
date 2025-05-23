@extends('layouts.master')

@section('title', 'History - Bisik Tangan')

@section('header', 'History')

@section('content')
<div class="card">

    <form method="GET" action="{{ route('history') }}" class="mb-3">
        <label for="sort" class="form-label">Urutkan berdasarkan:</label>
        <select name="sort" id="sort" class="form-select w-auto d-inline-block" onchange="this.form.submit()">
            <option value="" {{ $sort == '' ? 'selected' : '' }}>Default</option>
            <option value="alphabet" {{ $sort == 'alphabet' ? 'selected' : '' }}>Alphabet (A-Z)</option>
            <option value="newest" {{ $sort == 'newest' ? 'selected' : '' }}>Waktu: Terbaru</option>
            <option value="oldest" {{ $sort == 'oldest' ? 'selected' : '' }}>Waktu: Terlama</option>
        </select>
    </form>

    <table style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: #f0f0f0;">
            <tr>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">No</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Deskripsi</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Video</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($history as $index => $item)
            <tr>
                <td style="padding: 12px;">{{ $index + 1 }}</td>
                <td style="padding: 12px;">{{ $item->deskripsi }}</td>
                <td>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#videoModal{{ $item->id }}">
                        Lihat Video
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="videoModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="videoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Video History</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <video width="50%" controls>
                                        <source src="{{ asset('storage/' . $item->video_url) }}"
                                            type="video/mp4">
                                        Browser tidak mendukung video.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td style="padding: 12px;">
                    <form action="{{ route('history.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
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
@endsection
