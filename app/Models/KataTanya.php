<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KataTanya extends Model
{
    use HasFactory;

    protected $table = 'katatanya';
    protected $fillable = ['judul', 'deskripsi', 'video_url'];
}