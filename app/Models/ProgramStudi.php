<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studis';
    protected $fillable = ['nama_prodi', 'fakultas_id'];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'program_studi_id');
    }
}
