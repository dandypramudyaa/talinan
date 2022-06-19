<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasiBanjirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasi_banjir', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('nama_bank')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('parah_kerusakan_tempat_tinggal')->nullable();
            $table->string('tinggi_banjir')->nullable();
            $table->string('jumlah_anggota_keluarga')->nullable();
            $table->string('korban_jiwa')->nullable();
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
