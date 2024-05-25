<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_karyawan',
        'alamat',
        'no_telp',
        'jabatan'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
