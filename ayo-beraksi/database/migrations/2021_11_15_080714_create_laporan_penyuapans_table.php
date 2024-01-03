<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPenyuapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_penyuapans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_terlapor');
            $table->string('jabatan');
            $table->string('instansi');
            $table->unsignedBigInteger('id_pelapor')->nullable();
            $table->string('nama_pelapor');
            $table->string('jabatan_pelapor')->nullable();
            $table->string('instansi_pelapor')->nullable();
            $table->string('kasus_suap');
            $table->string('nilai_suap');
            $table->string('lokasi');
            $table->date('tanggal_kejadian')->nullable();
            $table->date('tanggal_pelaporan')->nullable();
            $table->text('kronologis_kejadian');
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
        Schema::dropIfExists('laporan_penyuapans');
    }
}
