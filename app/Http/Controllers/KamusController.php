<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alphabet; 
use App\Models\KataKerja;
use App\Models\KataSifat;
use App\Models\KataTanya;

class KamusController extends Controller
{
    public function kamus()
{
    return view('kamus'); 
    }

public function alphabet() {
        $alphabet = Alphabet::all(); // atau paginate()
    return view('kamus.alphabet', compact('alphabet'));
    }

    public function kataTanya() {
        $katatanya = KataTanya::all(); // atau paginate()
        return view('kamus.katatanya', compact('katatanya'));
    }

    public function kataKerja() {
        $katakerja = KataKerja::all(); // atau paginate()
        return view('kamus.katakerja', compact('katakerja'));
    }

    public function kataSifat() {
        $katasifat = KataSifat::all(); // atau paginate()
        return view('kamus.katasifat', compact('katasifat'));
    }

}