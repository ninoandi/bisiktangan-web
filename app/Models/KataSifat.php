<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KataSifat extends Model
{
    use HasFactory;

    protected $table = 'katasifat';
    protected $fillable = ['judul', 'deskripsi', 'video_url', 'gambar'];
}