<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhanhhanghoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanhhanghoa', function (Blueprint $table) {
            
            $table->bigIncrements('hhhh_id');
            $table->string('hhhh_hinhanh',199)->nullable();

            $table->bigInteger('hh_id')->unsigned();
            $table->foreign('hh_id')->references('hh_id')->on('hanghoa')->onDelete('CASCADE');

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
        Schema::dropIfExists('hinhanhhanghoa');
    }
}
