<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_level')->insert([
            ['level_kode'=> 'ADMIN', 'level_nama'=> 'Admin Web'],
            ['level_kode'=> 'DOSEN', 'level_nama'=>'Dosen'],
            ['level_kode'=> 'MAHASISWA', 'level_nama'=> 'Mahasiswa'],
            ['level_kode'=> 'UMUM', 'level_nama'=>'User Umum'],
        ]);
    }
}
