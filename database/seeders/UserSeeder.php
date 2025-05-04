<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        'name' => 'Nino',
        'email' => 'ninoandi2002@gmail.com',
        'password' => Hash::make('nino2002'),
        'jenis_kelamin' => 'Laki-laki',
        'tgl_lahir' => '2005-02-20',
        'no_hp' => '082143131449',
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    }
}