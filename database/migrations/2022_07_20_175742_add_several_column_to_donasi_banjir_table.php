<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeveralColumnToDonasiBanjirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donasi_banjir', function (Blueprint $table) {
            $table->string('rekomendasi')->nullable();
            $table->string('nilai_parah_kerusakan_tempat_tinggal')->nullable();
            $table->string('nilai_tinggi_banjir')->nullable();
            $table->string('nilai_jumlah_anggota_keluarga')->nullable();
            $table->string('nilai_korban_jiwa')->nullable();
            $table->string('nilai_anggota_keluarga_yang_terkena_penyakit')->nullable();
            $table->string('total_hasil')->nullable();
            $table->string('nilai_akhir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donasi_banjir', function (Blueprint $table) {
            //
        });
    }
}
