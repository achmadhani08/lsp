<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kode' => 'USR5b5ahd2a5698b4a6e',
            'nis' => '341434432',
            'fullname' => 'Achmad Dhani Syahputra',
            'username' => 'Dnsy',
            'password' => Hash::make('password'),
            'kelas' => '12 RPL',
            'alamat' => '',
            'photo' => '/img/akio.png',
            'verif' => 'verified',
            'role' => 'user',
            'join_date' => '2023-01-06'
        ]);

        User::create([
            'kode' => 'ADMdfha0368gc6bal1d6',
            'nis' => '',
            'fullname' => 'Admin Master',
            'username' => 'Admin',
            'password' => Hash::make('password'),
            'kelas' => '',
            'alamat' => '',
            'photo' => '/img/cat-1.png',
            'verif' => 'verified',
            'role' => 'admin',
            'join_date' => '2023-01-06'
        ]);
    }
}
