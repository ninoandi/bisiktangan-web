<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alphabet;
use Illuminate\Support\Facades\Storage;




class AlphabetController extends Controller
{

    public function index()
{
    $alphabet = Alphabet::all(); // Ambil semua data alphabet
    return view('kamus.alphabet', compact('alphabet')); // Kirim data ke view
}

    
    public function store(Request $request)
{
    // Validasi file video
    $request->validate([    
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'video_url' => 'required|mimes:mp4,mkv,avi|max:20480', // Maksimum ukuran 20MB
    ]);

    // Menyimpan video
    if ($request->hasFile('video_url')) {
        $videoPath = $request->file('video_url')->store('videos', 'public'); // menyimpan di folder 'public/videos'
    }

    // Menyimpan data ke database
    $alphabet = new Alphabet();
    $alphabet->judul = $request->judul;
    $alphabet->deskripsi = $request->deskripsi;
    $alphabet->video_url = $videoPath; // Menyimpan path video
    $alphabet->save();

    return redirect()->route('kamus.alphabet')->with('success', 'Data berhasil disimpan!'); // Arahkan ke halaman lain atau tampilkan pesan sukses
}

public function update(Request $request, $id)
{
    $alphabet = Alphabet::findOrFail($id);

    $request->validate([
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'video_url' => 'nullable|mimes:mp4,mkv,avi|max:20480',
    ]);

    $alphabet->judul = $request->judul;
    $alphabet->deskripsi = $request->deskripsi;

    // Jika ada video baru di-upload
    if ($request->hasFile('video_url')) {
        $videoPath = $request->file('video_url')->store('videos', 'public');
        $alphabet->video_url = $videoPath;
    }

    $alphabet->save();

    return redirect()->route('kamus.alphabet')->with('success', 'Data berhasil diperbarui!');
}

public function destroy($id)
{
    $alphabet = Alphabet::findOrFail($id);
    
    // Jika ingin hapus video dari storage juga:
    if ($alphabet->video_url && Storage::disk('public')->exists($alphabet->video_url)) {
        Storage::disk('public')->delete($alphabet->video_url);
    }

    $alphabet->delete();

    return redirect()->route('kamus.alphabet')->with('success', 'Data berhasil dihapus!');
}

}