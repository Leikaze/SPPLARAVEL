<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class spp_siswa extends Model
{
    use HasFactory;

    protected $table = 'spp_siswa';

    protected $fillable = [
        'kode_pembayaran',
        'tanggal_pembayaran',
        'nis',
        'nisn',
        'nama_lengkap',
        'kode_prodi',
        'kode_kelas',
        'semester',
        'nomer_hp'
    ];
}
