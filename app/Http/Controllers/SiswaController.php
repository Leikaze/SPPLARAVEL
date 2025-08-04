<?php

namespace App\Http\Controllers;

use App\Models\datasiswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = siswa::all();
        return view ('siswa', compact('siswa'));
    }

    public function formLogin()
{
    return view('login_mahasiswa'); // nama view untuk form login mahasiswa
}


    /**
     * Store a newly mahasiswaeated resource in storage.
     */
    public function register(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa',
            'username' => 'required|unique:siswa',
            'password' => 'required|min:4',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
        ]);

        return redirect('/login-mahasiswa')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home-mahasiswa');
        }

        return back()->withErrors(['username' => 'Username atau password salah.'])->onlyInput('username');
    }

    public function store(Request $request)
    {
    siswa::create([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kode_prodi' => $request->kode_prodi,
            'kode_kelas' => $request->kode_kelas,
            'semester' => $request->semester,
            'nomer_hp' => $request->nomer_hp,
            'username' => $request->username,
            'password' => $request->password
        ]);
        return redirect()->route('siswa.index')->with('sukses', 'Data berhasil ditambahkan!');
        }

    public function update(Request $request, $id)
    {
        $siswa = siswa::findOrFail($id);
        $siswa 
            ->update([
                'nis' => $request->nis,
                'nisn' => $request->nisn,
                'nama_lengkap' => $request->nama_lengkap,
                'kode_prodi' => $request->kode_prodi,
                'semester' => $request->semester,
                'nomer_hp' => $request->nomer_hp,
            ]);
            
            return redirect()->route('siswa.index')->with('sukses', 'Data berhasil di ubah');
        //kondisi ketika gagal
        if ($siswa) {
            return redirect()->route('siswa.index')->with('gagal', 'Data Tidak berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect()->route ('siswa.index')->with('sukses', 'Data berhasil dihapus');
    }
}
