<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function createUser()
    {
        User::create([
            'name' => 'Nino Andi',
            'email' => 'ninoandi2002@gmail.com',
            'password' => bcrypt('nino123'),
            'jenis_kelamin' => 'Laki-Laki',
            'tgl_lahir' => '2005-02-20',
            'no_hp' => '081234583018',
        ]);

        return 'User berhasil dibuat!';
    }
}