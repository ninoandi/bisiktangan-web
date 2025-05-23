<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KataTanya;
use Illuminate\Support\Facades\Storage;

class KataTanyaController extends Controller
{
    public function index(Request $request)
{
    $sort = $request->query('sort');

    $query = KataTanya::query();

    if ($sort === 'alphabet') {
        $query->orderBy('judul', 'asc'); 
    } elseif ($sort === 'newest') {
        $query->orderBy('created_at', 'desc');
    } elseif ($sort === 'oldest') {
        $query->orderBy('created_at', 'asc');
    }

    $katatanya = $query->get();

    return view('kamus.katatanya', compact('katatanya', 'sort'));
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

public function apiIndex()
{
    $katatanya = KataTanya::all()->map(function ($item) {
        $item->gambar = $item->gambar ? asset('storage/' . $item->gambar) : null;
        $item->video_url = $item->video_url ? asset('storage/' . $item->video_url) : null;
        return $item;
    });

    return response()->json($katatanya);
}
}