@extends('layouts.master')

@section('title', 'History - Bisik Tangan')

@section('header', 'History')

@section('content')
<div class="card">
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
                <td style="padding: 12px;">
                    <video width="150" controls>
                        <source src="{{ asset('storage/' . $item->video_url) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
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
