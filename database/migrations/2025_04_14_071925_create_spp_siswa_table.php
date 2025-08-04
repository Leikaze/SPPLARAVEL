<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spp_siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_pembayaran');
            $table->date('tanggal_pembayaran');
            $table->integer('nis');
            $table->integer('kode_kelas')->unique();
            $table->integer('kode_prodi')->unique();
            $table->string('semester');
            $table->enum('jenis_pembayaran', ['Tunai Lunas','Tunai Cicilan','Transfer Lunas', 'Transfer Cicilan']);
            $table->enum('status_pembayaran', ['Selesai','Pending','Belum Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spp_siswa');
    }
};
