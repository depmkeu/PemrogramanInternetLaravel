<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nim','nama','program_studi_id'];

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }
}
