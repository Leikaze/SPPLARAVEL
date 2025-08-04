<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        return view ('Prodi', compact ('prodi')); 
    }

    /**
     * Store a newly prodieated resource in storage.
     */
    public function store(Request $request)
    {
        prodi::create($request->all());
        return redirect()->route('prodi.index')->with('sukses', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prodi = prodi::findOrFail($id);
        $prodi 
            ->update([
                'kode_prodi' => $request->kode_prodi,
                'nama_prodi' => $request->nama_prodi,
                'ketua_prodi' => $request->ketua_prodi,
            ]);
            
            return redirect()->route('prodi.index')->with('sukses', 'Data berhasil di ubah');
        //kondisi ketika gagal
        if ($prodi) {
            return redirect()->route('prodi.index')->with('gagal', 'Data Tidak berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prodi = prodi::find($id);
        $prodi->delete();
        return redirect()->route ('prodi.index')->with('sukses', 'Data berhasil dihapus');
    }
}
