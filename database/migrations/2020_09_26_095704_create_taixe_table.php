<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaixeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taixe', function (Blueprint $table) {
            $table->bigIncrements('tx_id');
            $table->string('tx_hoten');
            $table->string('tx_hinhanh');
            $table->string('tx_vanbang');
            $table->string('tx_sdt');
            $table->string('tx_diachi');
            $table->bigInteger('cx_id')->unsigned();
            $table->foreign('cx_id')->references('cx_id')->on('chanhxe')->onDelete('CASCADE');
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
        Schema::dropIfExists('taixe');
    }
}
