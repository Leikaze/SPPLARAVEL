<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasiswa extends Model
{
    use HasFactory;

    protected $table = 'data_siswa'; // Nama tabelnya, bisa disesuaikan

    protected $fillable = [
        'nis',
        'nisn',
        'nama_lengkap',
        'kode_prodi',
        'semester',
        'nomer_hp'
    ];
}
