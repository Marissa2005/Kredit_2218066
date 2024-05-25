<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calonKreditur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_calon',
        'alamat',
        'no_telp',
        'jml_hutang',
        'pekerjaan',
        'penghasilan'
    ];

    public function jaminans()
    {
        return $this->hasMany(jaminan::class);
    }

    public function penilaians()
    {
        return $this->hasMany(penilaian::class);
    }
    public function perankingans()
    {
        return $this->hasMany(perankingan::class);
    }
}
