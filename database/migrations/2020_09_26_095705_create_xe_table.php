<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xe', function (Blueprint $table) {
            $table->bigIncrements('x_id');
            $table->string('x_bienso',199);
            $table->text('x_mota',199)->nullable();
            $table->string('x_hinhanhxe',199)->nullable();

            $table->bigInteger('cx_id')->unsigned();
            $table->foreign('cx_id')->references('cx_id')->on('chanhxe')->onDelete('CASCADE');

            $table->bigInteger('tx_id')->unsigned();
            $table->foreign('tx_id')->references('tx_id')->on('taixe')->onDelete('CASCADE');

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
        Schema::dropIfExists('xe');
    }
}
