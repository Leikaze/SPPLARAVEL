<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DB;
use App\Models\spp_siswa;
use Illuminate\Http\Request;

class SppSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spp_siswa = spp_siswa::all();
        return view ('sppsiswa', compact('spp_siswa'));
    }

    /**

     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        spp_siswa::create($request->all());
        return redirect()->route('sppsiswa.index')->with('sukses', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(spp_siswa $spp_siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(spp_siswa $spp_siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $spp_siswa = spp_siswa::findOrFail($id);
        $spp_siswa 
            ->update([
                'kode_pembayaran' => $request->kode_pembayaran,
                'tanggal_pembayaran' => $request->tanggal_pembayaran,
                'nis' => $request->nis,
                'kode_prodi' => $request->kode_prodi,
                'kode_kelas' => $request->kode_kelas,
                'semester' => $request->semester,
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'status_pembayaran' => $request->status_pembayaran,
            ]);
            
            return redirect()->route('sppsiswa.index')->with('success', 'Data berhasil di ubah');
        //kondisi ketika gagal
        if ($spp_siswa) {
            return redirect()->route('sppsiswa.index')->with('gagal', 'Data Tidak berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spp_siswa = spp_siswa::find($id);
        $spp_siswa->delete();
        return redirect()->route ('sppsiswa.index')->with('sukses', 'Data berhasil dihapus');
    }
}
