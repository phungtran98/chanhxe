<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuyen', function (Blueprint $table) {
            $table->bigIncrements('t_id');
            $table->string('t_tentuyen',199);
            $table->string('t_mota',199);
            $table->time('t_tgdi')->nullable();
            $table->time('t_tgden')->nullable();

            $table->bigInteger('bdx_id')->unsigned();
            $table->foreign('bdx_id')->references('bdx_id')->on('baidauxe')->onDelete('CASCADE');
            
            $table->bigInteger('x_id')->unsigned();
            $table->foreign('x_id')->references('x_id')->on('xe')->onDelete('CASCADE');

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
        Schema::dropIfExists('tuyen');
    }
}
