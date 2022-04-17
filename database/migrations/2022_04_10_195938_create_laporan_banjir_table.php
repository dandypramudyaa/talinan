<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanBanjirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_banjir', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_bencana')->nullable();
            $table->time('waktu_bencana')->nullable();
            $table->longText('alamat_bencana')->nullable();
            $table->string('jumlah_rumah_terkena_banjir')->nullable();
            $table->string('jumlah_korban_luka_berat')->nullable();
            $table->string('jumlah_korban_luka_ringan')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_banjir');
    }
}
