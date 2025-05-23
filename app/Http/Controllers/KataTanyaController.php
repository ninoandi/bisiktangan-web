<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KataTanya;
use Illuminate\Support\Facades\Storage;

class KataTanyaController extends Controller
{
    public function index()
    {
        $katatanya = KataTanya::all(); // Ambil semua data katatanya
        return view('kamus.katatanya', compact('katatanya')); // Kirim data ke view
    }
    
    public function store(Request $request)
{
    // Validasi file video
    $request->validate([    
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'video_url' => 'required|mimes:mp4,mkv,avi|max:20480', // Maksimum ukuran 20MB
    ]);

    // Menyimpan video
    if ($request->hasFile('video_url')) {
        $videoPath = $request->file('video_url')->store('videos', 'public'); // menyimpan di folder 'public/videos'
    }

    // Menyimpan data ke database
    $katatanya = new KataTanya();
    $katatanya->judul = $request->judul;
    $katatanya->deskripsi = $request->deskripsi;
    $katatanya->video_url = $videoPath; // Menyimpan path video
    $katatanya->save();

    return redirect()->route('kamus.katatanya')->with('success', 'Data berhasil disimpan!'); // Arahkan ke halaman lain atau tampilkan pesan sukses
}

public function update(Request $request, $id)
{
    $katatanya = KataTanya::findOrFail($id);

    $request->validate([
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'video_url' => 'nullable|mimes:mp4,mkv,avi|max:20480',
    ]);

    $katatanya->judul = $request->judul;
    $katatanya->deskripsi = $request->deskripsi;

    // Jika ada video baru di-upload
    if ($request->hasFile('video_url')) {
        $videoPath = $request->file('video_url')->store('videos', 'public');
        $katatanya->video_url = $videoPath;
    }

    $katatanya->save();

    return redirect()->route('kamus.katatanya')->with('success', 'Data berhasil diperbarui!');
}

public function destroy($id)
{
    $katatanya = KataTanya::findOrFail($id);
    
    // Jika ingin hapus video dari storage juga:
    if ($katatanya->video_url && Storage::disk('public')->exists($katatanya->video_url)) {
        Storage::disk('public')->delete($katatanya->video_url);
    }

    $katatanya->delete();

    return redirect()->route('kamus.katatanya')->with('success', 'Data berhasil dihapus!');
}
}