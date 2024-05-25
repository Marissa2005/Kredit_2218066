<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'calon_kreditur_id',
        'kriteria_id',
        'nilai',
    ];
    public function calonKrediturs()
    {
        return $this->belongsTo(calonKreditur::class, 'calon_kreditur_id');
    }
    public function kriterias()
    {
        return $this->belongsTo(kriteria::class, 'kriteria_id');
    }

    public function normalisasi($id)
    {
        $data = [];
        $kriteria = kriteria::find($id);

        // foreach ($kriteria as $kriterias) {
        if ($this->kriteria_id == $kriteria->id) {
            $max = penilaian::where('kriteria_id', $this->kriteria_id)
                ->max('nilai');
            $min = penilaian::where('kriteria_id', $this->kriteria_id)
                ->min('nilai');
            if (!$this->nilai == 0.00) {
                if ($kriteria->kategori == "Benefit") {
                    $hasil_normalisasi = round($this->nilai / $max, 2);
                } else {
                    $hasil_normalisasi = round($min / $this->nilai, 2);
                }
            } else {
                $hasil_normalisasi = 0.00;
            }

            $hasil_saw = $this->kriterias->bobot_kriteria * $hasil_normalisasi;

            $data[] = [
                'calon_id' => $this->calon_kreditur_id,
                'nama' => $this->calonKrediturs->nama_calon,
                'nilai_alternatif' => $this->nilai,
                'kriteria_id' => $this->kriteria_id,
                'nilai_kategori' => ($kriteria->kategori == "Benefit") ? $max : $min,
                'bobot_kriteria' => $this->kriterias->bobot_kriteria,
                'hasil_normalisasi' => $hasil_normalisasi,
                'hasil_saw' => $hasil_saw
            ];
        }
        // }
        return $data;
    }
}
