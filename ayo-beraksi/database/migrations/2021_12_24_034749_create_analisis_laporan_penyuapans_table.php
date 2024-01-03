<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisisLaporanPenyuapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis_laporan_penyuapans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penyuapan')->nullable();
            $table->text('hasil_investigasi');
            $table->text('kesimpulan');
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
        Schema::dropIfExists('analisis_laporan_penyuapans');
    }
}
