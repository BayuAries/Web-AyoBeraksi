<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanGratifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_gratifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('no_laporan')->nullable();
            $table->string('pengirim')->nullable();
            $table->unsignedBigInteger('id_pelapor')->nullable();
            $table->string('nama_pelapor');
            $table->string('nama_terlapor');
            $table->string('jabatan');
            $table->string('instansi');
            $table->date('tanggal_kejadian')->nullable();
            $table->date('tanggal_pelaporan')->nullable();
            $table->text('kronologis_kejadian');
            $table->string('status')->nullable();
            $table->string('deskripsi_status')->nullable();
            $table->string('tindaklanjut')->nullable();
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
        Schema::dropIfExists('laporan_gratifikasis');
    }
}
