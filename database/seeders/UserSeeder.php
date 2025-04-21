<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_user')->insert([
            [
                'level_id'=>1, //ADMIN
                'username' => 'admin',
                'nama'=> 'Administrator',
                'email'=> 'admin@polinema.ac.id',
                'password'=> Hash::make('password'),
                'profile_picture'=> null,
                'bio'=> 'Super admin JTI'
            ],
            [
                'level_id' => 2, //DOSEN
                'username' => 'dosen_andi',
                'nama'=> 'Pak Andi',
                'email' => 'andi@polinema.ac.id',
                'password'=> Hash::make('password'),
                'profile_piture' => null,
                'bio'=> 'Dosen Data Mining'

            ],
            [
                'level_id' => 3, // MAHASISWA
                'username' => 'budi_wasesa',
                'nama' => 'Budi Tarigan',
                'email' => 'budi@polinema.ac.id.',
                'password' => Hash::make('password'),
                'profile_picture' => null,
                'bio' => 'Mahasiswa semester 5'
            ],
        ]);
    }
}
