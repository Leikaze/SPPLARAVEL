<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Mahasiswa;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('login');
    }

    public function loginMahasiswa(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $mahasiswa = Mahasiswa::where('username', $request->username)
                      ->where('password', $request->password)
                      ->first();

        if ($mahasiswa) {
            session(['mahasiswa' => $mahasiswa->username]);
            return redirect('/home');
        }

        return back()->with('error_mahasiswa', 'Username atau password mahasiswa salah.');
    }

    public function registerMahasiswa(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nim' => 'required|unique:mahasiswas,nim',
            'username' => 'required|unique:mahasiswas,username',
            'password' => 'required|min:4'
        ]);

        Mahasiswa::create($request->all());
        return redirect('/')->with('success', 'Registrasi berhasil, silakan login!');
    }
}
