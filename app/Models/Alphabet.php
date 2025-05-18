<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alphabet extends Model
{
    use HasFactory;

    protected $table = 'alphabet';
    protected $fillable = ['judul', 'deskripsi', 'video_url', 'gambar'];

}