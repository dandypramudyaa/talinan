<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBantuanDanaBanjirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bantuan_dana_banjir', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nomor_nik')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('jumlah_anggota_keluarga')->nullable();
            $table->string('kerusakan_rumah')->nullable();
            $table->string('penghasilan')->nullable();
            $table->string('anggota_keluarga_yang_terkena_penyakit')->nullable();
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
        Schema::dropIfExists('donasi_banjir');
    }
}
