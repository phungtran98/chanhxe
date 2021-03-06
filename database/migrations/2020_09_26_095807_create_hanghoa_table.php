<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHanghoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hanghoa', function (Blueprint $table) {
            $table->bigIncrements('hh_id');
            $table->string('hh_ten',199);
            $table->float('hh_khoiluong');
            $table->bigInteger('hh_tienthuho');
            $table->integer('hh_giatri');
            $table->integer('hh_soluong');
            $table->string('hh_kichthuoc'); 
            
            // $table->string('hh_hinhanh')->nullable();
            $table->string('hh_mota',199)->nullable();
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
        Schema::dropIfExists('hanghoa');
    }
}
