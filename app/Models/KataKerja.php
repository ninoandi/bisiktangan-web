<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KataKerja extends Model
{
    use HasFactory;

    protected $table = 'katakerja';
    protected $fillable = ['judul', 'deskripsi', 'video_url', 'gambar'];
}