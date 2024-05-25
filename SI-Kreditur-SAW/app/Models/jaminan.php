<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jaminan extends Model
{
    use HasFactory;
    protected $fillable = [
        'calon_id',
        'jenis_aset',
        'nilai_aset',
        'status_kepemilikan',
    ];

    public function calonKrediturs()
    {
        return $this->belongsTo(calonKreditur::class, 'calon_id');
    }
}
