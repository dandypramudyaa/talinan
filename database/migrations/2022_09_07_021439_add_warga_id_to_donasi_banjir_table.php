<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWargaIdToDonasiBanjirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donasi_banjir', function (Blueprint $table) {
            $table->unsignedBigInteger('warga_id')->index()->nullable();
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
            $table->dropColumn('warga_id');
        });
    }
}
