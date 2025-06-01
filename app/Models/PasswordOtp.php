<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PasswordOtp extends Model
{
    protected $fillable = ['email', 'otp', 'expires_at'];

    public $timestamps = true;

    public function isExpired()
    {
        return Carbon::now()->gt($this->expires_at);
    }
}