<?php

namespace App\Http\Controllers;

use App\Models\calonKreditur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CalonKrediturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data pegawai
        $data = calonKreditur::all();

        return view('pages.kreditur.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_calon' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'jml_hutang' => 'nullable',
            'pekerjaan' => 'nullable',
            'penghasilan' => 'nullable',
        ]);
        // jika validasi terdapat bernilai false maka dikembalikan ke halaman user dan menampilkan alert toast
        if ($validator->fails()) {
            $msg = $validator->messages()->all();
            Alert::toast($msg, 'error');
            return back();
        }

        // proses menambagkan data baru ke table pegawai
        $savecalonKreditur = new calonKreditur([
            'nama_calon' => $request->nama_calon,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'jml_hutang' => $request->jml_hutang,
            'pekerjaan' => $request->pekerjaan,
            'penghasilan' => $request->penghasilan
        ]);

        $savecalonKreditur->save();
        // alert succes ketika menambahkan data berhasil
        Alert::success('Success!', 'Created Successfully');
        // kembali ke halaman karyawan
        return redirect()->route('kreditur.index');
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
        $validator = Validator::make($request->all(), [
            'nama_calon' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'jml_hutang' => 'nullable',
            'pekerjaan' => 'nullable',
            'penghasilan' => 'nullable',
        ]);
        // jika validasi terdapat bernilai false maka dikembalikan ke halaman user dan menampilkan alert toast
        if ($validator->fails()) {
            $msg = $validator->messages()->all();
            Alert::toast($msg, 'error');
            return back();
        }

        calonKreditur::find($request->id)->update([
            'nama_calon' => $request->nama_calon,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'jml_hutang' => $request->jml_hutang,
            'pekerjaan' => $request->pekerjaan,
            'penghasilan' => $request->penghasilan
        ]);

        // alert succes ketika update data berhasil
        Alert::toast('Updated Successfully', 'success');
        // kembali ke halaman user
        return redirect()->route('kreditur.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        calonKreditur::find($id)->delete();
        // alert succes ketika update data berhasil
        Alert::toast('Delete Successfully', 'success');
        // kembali ke halaman user
        return redirect()->route('kreditur.index');
    }
}
