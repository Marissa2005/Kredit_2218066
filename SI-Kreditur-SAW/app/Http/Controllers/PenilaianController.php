<?php

namespace App\Http\Controllers;

use App\Models\calonKreditur;
use App\Models\kriteria;
use App\Models\penilaian;
use App\Models\perankingan;
use App\Models\subKriteria;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penilaian = penilaian::all();
        $kriteria = kriteria::all();
        $subKriteria = subKriteria::all();
        $calonKreditur = calonKreditur::whereHas('penilaians')->get();
        $getAllKreditur = calonKreditur::All();
        $dataSAW = [];
        $dataBaru = [];
        foreach ($penilaian as $nilais) {
            foreach ($kriteria as $kriterias) {
                if ($nilais) {
                    foreach ($nilais->normalisasi($kriterias->id) as $dt) {
                        $dataSAW[] = $dt;
                    }
                }
            }
        }

        if ($dataSAW) {
            foreach ($calonKreditur as $calonKrediturs) {
                $akhir = 0;

                foreach ($dataSAW as $key) {
                    if ($key['calon_id'] == $calonKrediturs->id) {
                        $found = false;
                        $akhir += $key['hasil_saw'];

                        foreach ($dataBaru as &$item) {
                            if ($item['calon_id'] == $key['calon_id']) {
                                $found = true;
                                $item['hasil_saw'] = $akhir;
                                break;
                            }
                        }

                        if (!$found) {
                            $dataBaru[] = [
                                'calon_id' => $key['calon_id'],
                                'nama' => $key['nama'],
                                'bobot_kriteria' => $key['bobot_kriteria'],
                                'hasil_normalisasi' => $key['hasil_normalisasi'],
                                'hasil_saw' => $akhir
                            ];
                        }
                    }
                }

                usort($dataBaru, function ($a, $b) {
                    return $b['hasil_saw'] <=> $a['hasil_saw'];
                });

                $ranking = 1;
                foreach ($dataBaru as &$item) {
                    $item['ranking'] = $ranking;
                    $ranking++;
                }
                // $topThree = array_slice($dataBaru, 0, $lowker->batas_diterima);
                perankingan::updateOrCreate(
                    ['calon_id' => $calonKrediturs->id],
                    ['nilai_hasil' => $akhir]
                );
            }
        }

        $data = [
            'penilaian' => $penilaian,
            'kriteria' => $kriteria,
            'subKriteria' => $subKriteria,
            'calonKreditur' => $calonKreditur,
            'getAllKreditur' => $getAllKreditur,
            'ranking' => $dataBaru,
            'dataSAW' => $dataSAW
        ];

        // dd($data);

        return view('pages.penilaian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cetak()
    {
        $penilaian = penilaian::all();
        $kriteria = kriteria::all();
        $subKriteria = subKriteria::all();
        $calonKreditur = calonKreditur::whereHas('penilaians')->get();
        $getAllKreditur = calonKreditur::All();
        $dataSAW = [];
        $dataBaru = [];
        foreach ($penilaian as $nilais) {
            foreach ($kriteria as $kriterias) {
                if ($nilais) {
                    foreach ($nilais->normalisasi($kriterias->id) as $dt) {
                        $dataSAW[] = $dt;
                    }
                }
            }
        }

        if ($dataSAW) {
            foreach ($calonKreditur as $calonKrediturs) {
                $akhir = 0;

                foreach ($dataSAW as $key) {
                    if ($key['calon_id'] == $calonKrediturs->id) {
                        $found = false;
                        $akhir += $key['hasil_saw'];

                        foreach ($dataBaru as &$item) {
                            if ($item['calon_id'] == $key['calon_id']) {
                                $found = true;
                                $item['hasil_saw'] = $akhir;
                                break;
                            }
                        }

                        if (!$found) {
                            $dataBaru[] = [
                                'calon_id' => $key['calon_id'],
                                'nama' => $key['nama'],
                                'bobot_kriteria' => $key['bobot_kriteria'],
                                'hasil_normalisasi' => $key['hasil_normalisasi'],
                                'hasil_saw' => $akhir
                            ];
                        }
                    }
                }

                usort($dataBaru, function ($a, $b) {
                    return $b['hasil_saw'] <=> $a['hasil_saw'];
                });

                $ranking = 1;
                foreach ($dataBaru as &$item) {
                    $item['ranking'] = $ranking;
                    $ranking++;
                }
                // $topThree = array_slice($dataBaru, 0, $lowker->batas_diterima);
                perankingan::updateOrCreate(
                    ['calon_id' => $calonKrediturs->id],
                    ['nilai_hasil' => $akhir]
                );
            }
        }

        $data = [
            'penilaian' => $penilaian,
            'kriteria' => $kriteria,
            'subKriteria' => $subKriteria,
            'calonKreditur' => $calonKreditur,
            'getAllKreditur' => $getAllKreditur,
            'ranking' => $dataBaru,
            'dataSAW' => $dataSAW,
            'date' => date("d-M-Y"),
        ];

        $pdf = Pdf::loadView('pages.penilaian.print', $data);
        return $pdf->download('penilaian.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kriteria = kriteria::all();
        foreach ($kriteria as $kriterias) {
            $penilaian = new penilaian([
                'calon_kreditur_id' => $request->calonKreditur,
                'kriteria_id' => $kriterias->id,
                'nilai' => $request->data[str_replace(' ', '_', $kriterias->nama_kriteria)]
            ]);
            $penilaian->save();
        }

        // alert succes ketika menambahkan data berhasil
        Alert::success('Success!', 'Created Successfully');
        // kembali ke halaman kriteria
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
