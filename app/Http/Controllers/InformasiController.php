<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Informasi;

class InformasiController extends Controller
{
    public function index(Request $request)
{
    $sort = $request->query('sort');

    $query = Informasi::query();

    if ($sort === 'alphabet') {
        $query->orderBy('judul', 'asc'); 
    } elseif ($sort === 'newest') {
        $query->orderBy('created_at', 'desc');
    } elseif ($sort === 'oldest') {
        $query->orderBy('created_at', 'asc');
    }

    $informasi = $query->get();

    return view('informasi', compact('informasi', 'sort'));
}

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'caption' => 'required|string',
            'detail_informasi' => 'required|string',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $gambarPath = $request->file('gambar')->store('informasi_gambar', 'public');
        }

        $informasi = new Informasi();
        $informasi->judul = $request->judul;
        $informasi->gambar = $gambarPath;
        $informasi->caption = $request->caption;
        $informasi->detail_informasi = $request->detail_informasi;
        $informasi->save();

        return redirect()->route('informasi')->with('success', 'Informasi berhasil disimpan!');$request->validate([
            'judul' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'caption' => 'required|string',
            'detail_informasi' => 'required|string',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $gambarPath = $request->file('gambar')->store('informasi_gambar', 'public');
        }

        $informasi = new Informasi();
        $informasi->judul = $request->judul;
        $informasi->gambar = $gambarPath;
        $informasi->caption = $request->caption;
        $informasi->detail_informasi = $request->detail_informasi;
        $informasi->save();

        return redirect()->route('informasi')->with('success', 'Informasi berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'judul' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'caption' => 'required|string',
            'detail_informasi' => 'required|string',
        ]);

        $informasi->judul = $request->judul;
        $informasi->caption = $request->caption;
        $informasi->detail_informasi = $request->detail_informasi;

        if ($request->hasFile('gambar')) {
            if ($informasi->gambar && Storage::disk('public')->exists($informasi->gambar)) {
                Storage::disk('public')->delete($informasi->gambar);
            }
            $informasi->gambar = $request->file('gambar')->store('informasi_gambar', 'public');
        }

        $informasi->save();

        return redirect()->route('informasi')->with('success', 'Informasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);

        if ($informasi->gambar && Storage::disk('public')->exists($informasi->gambar)) {
            Storage::disk('public')->delete($informasi->gambar);
        }

        $informasi->delete();

        return redirect()->route('informasi')->with('success', 'Informasi berhasil dihapus!');
    }

    public function apiIndex()
{
    $informasi = Informasi::all()->map(function ($item) {
        $item->gambar = $item->gambar ? asset('storage/' . $item->gambar) : null;
        return $item;
    });

    return response()->json($informasi);
}
}