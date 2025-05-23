@extends('layouts.master')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
<div class="card shadow-sm border-0 text-white" style="background: linear-gradient(135deg, #4e54c8, #8f94fb);">
    <div class="card-body">
        <h5 class="card-title mb-1">Halo, {{ Auth::user()->name }} </h5>
        <p class="card-text mb-0">Selamat datang kembali !</p>
    </div>
</div>


    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 30px;">
        <div style="flex: 1 1 calc(50% - 20px); background: linear-gradient(135deg, #667eea, #764ba2); color: white; border-radius: 12px; padding: 24px;">
            <h4>Alphabet</h4>
            <h2>{{ $totalAlphabet }}</h2>
        </div>

        <div style="flex: 1 1 calc(50% - 20px); background: linear-gradient(135deg, #43cea2, #185a9d); color: white; border-radius: 12px; padding: 24px;">
            <h4>Kata Kerja</h4>
            <h2>{{ $totalKataKerja }}</h2>
        </div>

        <div style="flex: 1 1 calc(50% - 20px); background: linear-gradient(135deg, #f7971e, #ffd200); color: white; border-radius: 12px; padding: 24px;">
            <h4>Kata Sifat</h4>
            <h2>{{ $totalKataSifat }}</h2>
        </div>

        <div style="flex: 1 1 calc(50% - 20px); background: linear-gradient(135deg, #00c6ff, #0072ff); color: white; border-radius: 12px; padding: 24px;">
            <h4>Kata Tanya</h4>
            <h2>{{ $totalKataTanya }}</h2>
        </div>
    </div>
@endsection
