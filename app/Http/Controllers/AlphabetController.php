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
    $request->validate([
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'video_url' => 'required|mimes:mp4,mkv,avi|max:20480', // Maksimum ukuran 20MB
    ]);

    $gambarPath = null;
    if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
        $gambarPath = $request->file('gambar')->store('alphabet_gambar', 'public');
    }

    $videoPath = null;
    if ($request->hasFile('video_url') && $request->file('video_url')->isValid()) {
    $videoPath = $request->file('video_url')->store('videos', 'public');
    }


    $alphabet = new Alphabet();
    $alphabet->judul = $request->judul;
    $alphabet->gambar = $gambarPath;
    $alphabet->deskripsi = $request->deskripsi;
    $alphabet->video_url = $videoPath;
    $alphabet->save();

    return redirect()->route('kamus.alphabet')->with('success', 'Alphabet berhasil disimpan!');
}

public function update(Request $request, $id)
{
    $alphabet = Alphabet::findOrFail($id);

    $request->validate([
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'video_url' => 'nullable|mimes:mp4,mkv,avi|max:20480',
    ]);

    $alphabet->judul = $request->judul;
    $alphabet->deskripsi = $request->deskripsi;

    // Jika ada video baru di-upload
    if ($request->hasFile('video_url')) {
        $videoPath = $request->file('video_url')->store('videos', 'public');
        $alphabet->video_url = $videoPath;
    }

    if ($request->hasFile('gambar')) {
        // Hapus foto lama
        if ($alphabet->gambar && Storage::disk('public')->exists($alphabet->gambar)) {
            Storage::disk('public')->delete($alphabet->gambar);
        }
        $alphabet->gambar = $request->file('gambar')->store('foto_alphabet', 'public');
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
    // Hapus foto dari storage
    if ($alphabet->gambar && Storage::disk('public')->exists($alphabet->gambar)) {
        Storage::disk('public')->delete($alphabet->gambar);
    }

    $alphabet->delete();

    return redirect()->route('kamus.alphabet')->with('success', 'Data berhasil dihapus!');
}

}