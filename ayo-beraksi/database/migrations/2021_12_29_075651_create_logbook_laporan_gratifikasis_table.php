<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogbookLaporanGratifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbook_laporan_gratifikasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_gratifikasi')->nullable();
            $table->unsignedBigInteger('id_analisis_gratifikasi')->nullable();
            $table->string('hasil_analisis')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('logbook_laporan_gratifikasis');
    }
}
