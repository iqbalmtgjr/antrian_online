<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntrianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pelayanan');
            $table->integer('id_user');
            $table->integer('no_antrian')->nullable();
            $table->string('hari', 6);
            $table->date('tgl_antrian');
            $table->time('waktu_awal_antrian');
            $table->time('waktu_akhir_antrian')->nullable();
            $table->time('lama_pelayanan')->nullable();
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
        Schema::dropIfExists('antrian');
    }
}
