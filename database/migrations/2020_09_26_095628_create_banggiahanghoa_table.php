<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanggiahanghoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banggiahanghoa', function (Blueprint $table) {
            $table->bigIncrements('bg_id');
            $table->string('bg_khoiluong',5);
            $table->integer('bg_thanhtientien');
            $table->string('bg_khoangcach',199);
            $table->string('bg_thoigian',5);
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
        Schema::dropIfExists('banggiahanghoa');
    }
}
