<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_category')->insert([
            ['kategori_kode' => 'WEB', 'kategori_nama' => 'Web Development'],
            ['kategori_kode' => 'MOBILE', 'kategori_nama' => 'Mobile App'],
            ['kategori_kode' => 'UIUX', 'kategori_nama' => 'UI/UX Design'],
            ['kategori_kode' => 'IOT', 'kategori_nama' => 'Internet of Things'],
        ]);
    }
}
