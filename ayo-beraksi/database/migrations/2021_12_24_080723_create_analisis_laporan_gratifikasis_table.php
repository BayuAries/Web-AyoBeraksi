<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisisLaporanGratifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis_laporan_gratifikasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_gratifikasi')->nullable();
            $table->string('jenis_gratifikasi');
            $table->string('nilai_gratifikasi');
            $table->string('frekuensi_pelapor');
            $table->text('tujuan');
            $table->string('status_batas');
            $table->string('status_frekuensi');
            $table->string('rekomendasi_tindak_lanjut');
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
        Schema::dropIfExists('analisis_laporan_gratifikasis');
    }
}
