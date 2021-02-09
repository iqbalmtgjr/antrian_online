<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntrianLamaPelayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian_lama_pelayanan', function (Blueprint $table) {

            $table->foreignId('antrian_id');
            $table->foreignId('lama_pelayanan_id');
            $table->primary(['antrian_id', 'lama_pelayanan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antrian_lama_pelayanan');
    }
}
