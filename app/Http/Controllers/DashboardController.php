<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alphabet;
use App\Models\KataKerja;
use App\Models\KataSifat;
use App\Models\KataTanya;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAlphabet = Alphabet::count();
        $totalKataKerja = KataKerja::count();
        $totalKataSifat = KataSifat::count();
        $totalKataTanya = KataTanya::count();

        return view('dashboard', compact('totalAlphabet', 'totalKataKerja', 'totalKataSifat', 'totalKataTanya'));
    }
}