<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kriteria',
        'kategori',
        'bobot_kriteria',
    ];

    public function subKriterias()
    {
        return $this->hasMany(subKriteria::class);
    }

    // public function penilaians()
    // {
    //     return $this->hasMany(penilaian::class);
    // }
}
