<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryUser;

class HistoryController extends Controller
{
    public function history()
{
    return view('history'); 
}

public function index()
    {
        // Ambil semua data history dari database
        $history = HistoryUser::all();

        // Kirim data ke view 'history' (sesuaikan nama view-mu)
        return view('history', compact('history'));
    }

    public function destroy($id)
{
    $history = HistoryUser::findOrFail($id);
    $history->delete();

    return redirect()->route('history.index')->with('success', 'Data berhasil dihapus!');
}
}