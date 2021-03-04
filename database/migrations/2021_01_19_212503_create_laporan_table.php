<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelayanan');
            $table->foreignId('id_user');
            $table->foreignId('lamapelayanan_id');
            $table->integer('no_antrian')->nullable();
            $table->string('hari', 6);
            $table->date('tgl_antrian');
            $table->time('waktu_awal_antrian');
            $table->time('waktu_akhir_antrian')->nullable();
            $table->time('lama_menunggu')->nullable();
            $table->time('waktu_awal_pelayanan')->nullable();
            $table->time('waktu_akhir_pelayanan')->nullable();
            $table->time('lama_pelayanan')->nullable();
            $table->time('estimasi')->nullable();
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
        Schema::dropIfExists('laporans');
    }
}
