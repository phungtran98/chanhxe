<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quan', function (Blueprint $table) {
            $table->bigIncrements('q_id');
            $table->string('q_ten');
            $table->string('q_mota');

            $table->bigInteger('t_id')->unsigned();
            $table->foreign('t_id')->references('t_id')->on('tinh')->onDelete('CASCADE');
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
        Schema::dropIfExists('quan');
    }
}
