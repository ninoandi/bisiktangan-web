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

public function index(Request $request)
{
    $sort = $request->query('sort');

    $query = HistoryUser::query();

    if ($sort === 'alphabet') {
        $query->orderBy('deskripsi', 'asc'); 
    } elseif ($sort === 'newest') {
        $query->orderBy('created_at', 'desc');
    } elseif ($sort === 'oldest') {
        $query->orderBy('created_at', 'asc');
    }

    $history = $query->get();

    return view('history', compact('history', 'sort'));
}

    public function destroy($id)
{
    $history = HistoryUser::findOrFail($id);
    $history->delete();

    return redirect()->route('history.index')->with('success', 'Data berhasil dihapus!');
}
}