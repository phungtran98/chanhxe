<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiacuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giacuoc', function (Blueprint $table) {
            $table->bigIncrements('gc_id');
            $table->integer('gc_khoiluong');
            $table->integer('gc_kichthuoc');
            $table->integer('gc_gia');
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
        Schema::dropIfExists('giacuoc');
    }
}