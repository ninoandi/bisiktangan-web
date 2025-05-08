<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KamusController extends Controller
{
    public function kamus()
{
    return view('kamus'); // Sesuaikan dengan path view kamu
}

}