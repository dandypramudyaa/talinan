<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasiBanjirUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasi_banjir_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donasi_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('jumlah')->nullable();
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
        Schema::dropIfExists('donasi_banjir_users');
    }
}
