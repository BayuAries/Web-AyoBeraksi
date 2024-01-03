<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogbookLaporanPenyuapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbook_laporan_penyuapans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penyuapan')->nullable();
            $table->text('uraian_kejadian')->nullable();
            $table->text('saksi')->nullable();
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
        Schema::dropIfExists('logbook_laporan_penyuapans');
    }
}
