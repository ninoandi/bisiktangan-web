<?php

namespace App\Http\Controllers;
use App\Models\PasswordOtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

public function requestOtp(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $otp = rand(100000, 999999);

    PasswordOtp::create([
        'email' => $request->email,
        'otp' => $otp,
        'expires_at' => Carbon::now()->addMinutes(5),
    ]);

    // Kirim email (bisa juga kirim SMS jika pakai API lain)
    Mail::raw("Kode OTP Anda adalah: $otp", function ($message) use ($request) {
        $message->to($request->email)->subject('OTP Ganti Password');
    });

    return response()->json(['message' => 'OTP telah dikirim.'], 200);
}

public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required'
    ]);

    $otpData = PasswordOtp::where('email', $request->email)
                          ->where('otp', $request->otp)
                          ->latest()
                          ->first();

    if (!$otpData || $otpData->isExpired()) {
        return response()->json(['message' => 'OTP tidak valid atau sudah kadaluarsa'], 400);
    }

    return response()->json(['message' => 'OTP valid. Silakan reset password.'], 200);
}



public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required',
        'password' => 'required|min:6|confirmed',
    ]);

    $otpData = PasswordOtp::where('email', $request->email)
                          ->where('otp', $request->otp)
                          ->latest()
                          ->first();

    if (!$otpData || $otpData->isExpired()) {
        return response()->json(['message' => 'OTP tidak valid atau sudah kadaluarsa'], 400);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['message' => 'User tidak ditemukan'], 404);
    }

    $user->password = Hash::make($request->password);
    $user->save();

    // Hapus OTP setelah berhasil reset
    $otpData->delete();

    return response()->json(['message' => 'Password berhasil direset.'], 200);
}

