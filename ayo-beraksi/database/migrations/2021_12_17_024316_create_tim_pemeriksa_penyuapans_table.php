<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimPemeriksaPenyuapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tim_pemeriksa_penyuapans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_laporan_penyuapan')->nullable();
            $table->unsignedBigInteger('id_anggota')->nullable();
            $table->string('nama');
            $table->string('jabatan');
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
        Schema::dropIfExists('tim_pemeriksa_penyuapans');
    }
}
