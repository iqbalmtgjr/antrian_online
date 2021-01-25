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
            $table->integer('id_pelayanan')->nullable();
            $table->integer('id_user')->nullable();
            $table->integer('no_antrian')->nullable();
            $table->string('hari', 6)->nullable();
            $table->date('tgl_antrian')->nullable();
            $table->time('waktu_awal_antrian')->nullable();
            $table->time('waktu_akhir_antrian')->nullable();
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
