<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuong', function (Blueprint $table) {
            $table->bigIncrements('p_id');
            $table->string('p_ten');
            $table->string('p_mota');

            $table->bigInteger('q_id')->unsigned();
            $table->foreign('q_id')->references('q_id')->on('quan')->onDelete('CASCADE');
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
        Schema::dropIfExists('phuong');
    }
}
