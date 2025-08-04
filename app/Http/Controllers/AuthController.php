<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Registrasi Admin
    public function registrasiAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('/login-admin');
    }

    // Login Admin
    public function loginAdmin(Request $request)
    {
        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin', $admin);
            return redirect()->route('/home'); // Ganti dengan route dashboard admin
        }

        return redirect()->back()->with('error', 'username atau password salah.');
    }

    // Registrasi Mahasiswa
    public function registrasiMahasiswa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mahasiswa = new Mahasiswa();
        $mahasiswa->name = $request->name;
        $mahasiswa->email = $request->email;
        $mahasiswa->password = Hash::make($request->password);
        $mahasiswa->save();

        return redirect()->route('/');
    }

    // Login Mahasiswa
    public function loginMahasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::where('email', $request->email)->first();

        if ($mahasiswa && Hash::check($request->password, $mahasiswa->password)) {
            Session::put('mahasiswa', $mahasiswa);
            return redirect()->route('/home'); // Ganti dengan route dashboard mahasiswa
        }

        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    // Logout
    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
