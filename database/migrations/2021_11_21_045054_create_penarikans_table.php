<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenarikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penarikans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tabungan_id');
            $table->string('total');
            $table->timestamps();

            $table->foreign('tabungan_id')
                ->references('id')
                ->on('tabungans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penarikans');
    }
}
