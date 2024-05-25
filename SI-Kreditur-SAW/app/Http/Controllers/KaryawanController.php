<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
    public function index()
    {
        //mengambil semua data pegawai
        $data = karyawan::all();

        return view('pages.karyawan.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'nama_karyawan' => 'required',
            'jabatan' => 'nullable',
            'no_telp' => 'nullable',
            'alamat' => 'nullable',
        ]);
        // jika validasi terdapat bernilai false maka dikembalikan ke halaman user dan menampilkan alert toast
        if ($validator->fails()) {
            $msg = $validator->messages()->all();
            Alert::toast($msg, 'error');
            return back();
        }
        // proses menambahkan data baru ke table user
        $user = new User([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        // proses menambagkan data baru ke table pegawai
        $saveKaryawan = new karyawan([
            'user_id' => $user->id,
            'nama_karyawan' => $request->nama_karyawan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jabatan' => $request->jabatan
        ]);

        $saveKaryawan->save();
        // alert succes ketika menambahkan data berhasil
        Alert::success('Success!', 'Created Successfully');
        // kembali ke halaman karyawan
        return redirect()->route('karyawan.index');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'nama_karyawan' => 'required',
            'jabatan' => 'nullable',
            'no_telp' => 'nullable',
            'alamat' => 'nullable',
        ]);
        // jika validasi terdapat bernilai false maka dikembalikan ke halaman user dan menampilkan alert toast
        if ($validator->fails()) {
            $msg = $validator->messages()->all();
            Alert::toast($msg, 'error');
            return back();
        }
        // proses update data Role user jika jabatan diubah
        User::find($request->user_id)->update([
            'email' => $request->email
        ]);

        karyawan::find($request->id)->update([
            'nama_karyawan' => $request->nama_karyawan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jabatan' => $request->jabatan
        ]);

        // alert succes ketika update data berhasil
        Alert::toast('Updated Successfully', 'success');
        // kembali ke halaman user
        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // proses delete data
        karyawan::find($id)->delete();

        alert()->success('Success!', 'Post Deleted Successfully');
        return redirect()->route('karyawan.index')->with('message', 'Berhasil Dihapus');
    }
}
