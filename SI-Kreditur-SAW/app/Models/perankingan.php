<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perankingan extends Model
{
    use HasFactory;
    protected $fillable = [
        'calon_id',
        'nilai_hasil',
    ];

    public function calonKrediturs()
    {
        return $this->belongsTo(calonKreditur::class, 'calon_id');
    }
}
