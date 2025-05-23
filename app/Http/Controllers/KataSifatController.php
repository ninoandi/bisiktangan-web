<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KataSifat;
use Illuminate\Support\Facades\Storage;

class KataSifatController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort');
    
        $query = KataSifat::query();
    
        if ($sort === 'alphabet') {
            $query->orderBy('judul', 'asc'); 
        } elseif ($sort === 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sort === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }
    
        $katasifat = $query->get();
    
        return view('kamus.katasifat', compact('katasifat', 'sort'));
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
    $katasifat = new KataSifat();
    $katasifat->judul = $request->judul;
    $katasifat->deskripsi = $request->deskripsi;
    $katasifat->video_url = $videoPath; // Menyimpan path video
    $katasifat->save();

    return redirect()->route('kamus.katasifat')->with('success', 'Data berhasil disimpan!'); // Arahkan ke halaman lain atau tampilkan pesan sukses
}

public function update(Request $request, $id)
{
    $katasifat = KataSifat::findOrFail($id);

    $request->validate([
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'video_url' => 'nullable|mimes:mp4,mkv,avi|max:20480',
    ]);

    $katasifat->judul = $request->judul;
    $katasifat->deskripsi = $request->deskripsi;

    // Jika ada video baru di-upload
    if ($request->hasFile('video_url')) {
        $videoPath = $request->file('video_url')->store('videos', 'public');
        $katasifat->video_url = $videoPath;
    }

    $katasifat->save();

    return redirect()->route('kamus.katasifat')->with('success', 'Data berhasil diperbarui!');
}

public function destroy($id)
{
    $katasifat = KataSifat::findOrFail($id);
    
    // Jika ingin hapus video dari storage juga:
    if ($katasifat->video_url && Storage::disk('public')->exists($katasifat->video_url)) {
        Storage::disk('public')->delete($katasifat->video_url);
    }

    $katasifat->delete();

    return redirect()->route('kamus.katasifat')->with('success', 'Data berhasil dihapus!');
}

public function apiIndex()
{
    $katasifat = KataSifat::all()->map(function ($item) {
        $item->gambar = $item->gambar ? asset('storage/' . $item->gambar) : null;
        $item->video_url = $item->video_url ? asset('storage/' . $item->video_url) : null;
        return $item;
    });

    return response()->json($katasifat);
}
}