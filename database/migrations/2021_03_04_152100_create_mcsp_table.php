<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcsp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_antrian');
            $table->foreignId('id_lama_pelayanan');
            $table->time('waktu_rata_rata_tunggu');
            $table->float('rasio_pelayanan');
            $table->float('waktu_kosong_pelayanan');
            $table->float('jmlh_ratarata_masyarakat_dlm_antrian');
            $table->time('waktu_ratarata_masyarakat_dlm_antrian');
            $table->float('jmlh_ratarata_masyarakat_dlm_sistem');
            $table->time('waktu_ratarata_masyarakat_dlm_sistem');
            $table->float('jmlh_masyarakat_yg_mengantri');
            $table->string('rekomendasi');
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
        Schema::dropIfExists('mcsp');
    }
}
