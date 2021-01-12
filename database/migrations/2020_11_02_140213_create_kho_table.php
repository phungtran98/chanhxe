<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kho', function (Blueprint $table) {
            $table->bigIncrements('k_id');
            $table->string('k_ten')->nullable();
            $table->string('k_diachi');
            $table->float('lat',10,6)->nullable();
            $table->float('lng',10,6)->nullable();
            $table->bigInteger('t_id')->unsigned();
            $table->foreign('t_id')->references('t_id')->on('tuyen')->onDelete('CASCADE');
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
        Schema::dropIfExists('kho');
    }
}
