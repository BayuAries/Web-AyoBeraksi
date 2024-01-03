<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ketua');
            $table->unsignedBigInteger('id_pelapor')->nullable();
            $table->string('nama_pelapor');
            $table->string('alamat');
            $table->string('nik');
            $table->text('uraian_laporan');
            $table->text('saran_masukan');
            $table->date('tanggal_pengaduan')->nullable();
            $table->string('status')->nullable();
            $table->string('deskripsi_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_pengaduans');
    }
}
