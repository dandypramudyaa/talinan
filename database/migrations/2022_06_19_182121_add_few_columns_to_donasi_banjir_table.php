<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFewColumnsToDonasiBanjirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donasi_banjir', function (Blueprint $table) {
            $table->string('status')->nullable();
            $table->string('jumlah_yang_diberikan_admin')->nullable();
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
            $table->dropColumn('status');
            $table->dropColumn('jumlah_yang_diberikan_admin');
        });
    }
}
