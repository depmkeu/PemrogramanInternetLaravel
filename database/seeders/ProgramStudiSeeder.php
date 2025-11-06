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
            ['nama_prodi' => 'Teknik Informatika', 'fakultasid' => 1],
            ['nama_prodi' => 'Teknik Mesin', 'fakultasid' => 1],
            ['nama_prodi' => 'Akuntansi', 'fakultasid' => 2],
            ['nama_prodi' => 'Manajemen', 'fakultasid' => 2],
            ['nama_prodi' => 'Ilmu Hukum', 'fakultasid' => 3],
        ]);
    }
}
