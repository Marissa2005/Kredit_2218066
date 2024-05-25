<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //validasi request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // jika validasi terdapat bernilai false maka dikembalikan ke halaman login dan menampilkan alert toast
        if ($validator->fails()) {
            $msg = $validator->messages()->all();
            Alert::toast($msg, 'error');
            return back();
        }

        $data = User::where('email', $request->email)->first();

        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                Log::info('Password is correct');
                $request->session()->regenerate();
                $request->session()->put('user', [
                    'email' => $data->email,
                    'nama' => $data->karyawans?->nama_karyawan,
                ]);
                return redirect(route('dashboard'));
            } else {
                Log::info('Password is incorrect');
                Alert::toast('Password Anda Salah', 'error');
                return back();
            }
        } else {
            Log::info('email not found');
            Alert::toast('email Tidak Ditemukan', 'error');
            return back();
        }
    }

    public function register(Request $request)
    {
        // validasi $request
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // jika validasi terdapat bernilai false maka dikembalikan ke halaman user dan menampilkan alert toast
        if ($validator->fails()) {
            $msg = $validator->messages()->all();
            Alert::toast($msg, 'error');
            return back();
        }
        // proses menambahkan data baru ke database
        $user = new User([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        $karyawan = new karyawan([
            'nama_karyawan' => $request->nama
        ]);

        $karyawan->save();
        // alert succes ketika menambahkan data berhasil
        Alert::success('Success!', 'Register Successfully');
        // kembali ke halaman user
        return redirect()->route('auth.index');
    }

    public function logout()
    {
        session()->invalidate();
        return redirect('/');
    }
}
