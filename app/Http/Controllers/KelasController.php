<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = kelas::all();
        return view ('kelas', compact ('kelas')); 
    }

    /**
     * Store a newly kelaseated resource in storage.
     */
    public function store(Request $request)
    {
        kelas::create($request->all());
        return redirect()->route('kelas.index')->with('sukses', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kelas = kelas::findOrFail($id);
        $kelas 
            ->update([
                'kode_kelas' => $request->kode_kelas,
                'nama_kelas' => $request->nama_kelas,
                'tempat' => $request->tempat,
            ]);
            
            return redirect()->route('kelas.index')->with('sukses', 'Data berhasil di ubah');
        //kondisi ketika gagal
        if ($kelas) {
            return redirect()->route('kelas.index')->with('gagal', 'Data Tidak berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = kelas::find($id);
        $kelas->delete();
        return redirect()->route ('kelas.index')->with('sukses', 'Data berhasil dihapus');
    }
}
