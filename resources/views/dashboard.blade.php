@extends('layouts.master')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
    <div class="card">
        <p>Selamat Datang, {{ Auth::user()->name }}!</p>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 30px;">
        <div style="flex: 1 1 calc(50% - 20px); background: linear-gradient(to right, #fcb69f, #ff6e7f); color: white; border-radius: 12px; padding: 24px;">
            <h4>Alphabet</h4>
            <h2>{{ $totalAlphabet }}</h2>
        </div>

        <div style="flex: 1 1 calc(50% - 20px); background: linear-gradient(to right, #74ebd5, #9face6); color: white; border-radius: 12px; padding: 24px;">
            <h4>Kata Kerja</h4>
            <h2>{{ $totalKataKerja }}</h2>
        </div>

        <div style="flex: 1 1 calc(50% - 20px); background: linear-gradient(to right, #74ebd5, #9face6); color: white; border-radius: 12px; padding: 24px;">
            <h4>Kata Sifat</h4>
            <h2>{{ $totalKataSifat }}</h2>
        </div>

        <div style="flex: 1 1 calc(50% - 20px); background: linear-gradient(to right, #74ebd5, #9face6); color: white; border-radius: 12px; padding: 24px;">
            <h4>Kata Tanya</h4>
            <h2>{{ $totalKataTanya }}</h2>
        </div>
    </div>
@endsection
