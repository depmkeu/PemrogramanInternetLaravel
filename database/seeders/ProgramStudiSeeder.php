<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramStudi;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramStudi::insert([
            ['nama_prodi' => 'Teknik Informatika', 'fakultas_id' => 1],
            ['nama_prodi' => 'Teknik Mesin', 'fakultas_id' => 1],
            ['nama_prodi' => 'Akuntansi', 'fakultas_id' => 2],
            ['nama_prodi' => 'Manajemen', 'fakultas_id' => 2],
            ['nama_prodi' => 'Ilmu Hukum', 'fakultas_id' => 3],
        ]);
    }
}
