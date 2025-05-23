<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KataKerja;
use Illuminate\Support\Facades\Storage;

class KataKerjaController extends Controller
{

    public function index(Request $request)
{
    $sort = $request->query('sort');

    $query = KataKerja::query();

    if ($sort === 'alphabet') {
        $query->orderBy('judul', 'asc'); 
    } elseif ($sort === 'newest') {
        $query->orderBy('created_at', 'desc');
    } elseif ($sort === 'oldest') {
        $query->orderBy('created_at', 'asc');
    }

    $katakerja = $query->get();

    return view('kamus.katakerja', compact('katakerja', 'sort'));
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

    
    $gambarPath = null;
    if ($request->hasFile('gambar')) {
    $gambarPath = $request->file('gambar')->store('foto_alphabet', 'public');
}
    // Menyimpan video
    if ($request->hasFile('video_url')) {
        $videoPath = $request->file('video_url')->store('videos', 'public'); // menyimpan di folder 'public/videos'
    }

    // Menyimpan data ke database
    $katakerja = new KataKerja();
    $katakerja->judul = $request->judul;
    $katakerja->deskripsi = $request->deskripsi;
    $katakerja->video_url = $videoPath; // Menyimpan path video
    $katakerja->save();

    return redirect()->route('kamus.katakerja')->with('success', 'Data berhasil disimpan!'); // Arahkan ke halaman lain atau tampilkan pesan sukses
}

public function update(Request $request, $id)
{
    $katakerja = KataKerja::findOrFail($id);

    $request->validate([
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'video_url' => 'nullable|mimes:mp4,mkv,avi|max:20480',
    ]);

    $katakerja->judul = $request->judul;
    $katakerja->deskripsi = $request->deskripsi;

    // Jika ada video baru di-upload
    if ($request->hasFile('video_url')) {
        $videoPath = $request->file('video_url')->store('videos', 'public');
        $katakerja->video_url = $videoPath;
    }

    $katakerja->save();

    return redirect()->route('kamus.katakerja')->with('success', 'Data berhasil diperbarui!');
}

public function destroy($id)
{
    $katakerja = KataKerja::findOrFail($id);
    
    // Jika ingin hapus video dari storage juga:
    if ($katakerja->video_url && Storage::disk('public')->exists($katakerja->video_url)) {
        Storage::disk('public')->delete($katakerja->video_url);
    }

    $katakerja->delete();

    return redirect()->route('kamus.katakerja')->with('success', 'Data berhasil dihapus!');
}

public function apiIndex()
{
    $katakerja = KataKerja::all()->map(function ($item) {
        $item->gambar = $item->gambar ? asset('storage/' . $item->gambar) : null;
        $item->video_url = $item->video_url ? asset('storage/' . $item->video_url) : null;
        return $item;
    });

    return response()->json($katakerja);
}
}