<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryUser extends Model
{
    use HasFactory; 
    
    protected $table = 'history_user'; // nama tabel di database
    protected $fillable = ['deskripsi', 'video'];
    
    public function user() {
    return $this->belongsTo(User::class, 'id_user');
}
}