<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{

    protected $fillable = ['nama_fakultas'];

    public function programStudi()
    {
        return $this->hasMany(ProgramStudi::class);
    }
}
