<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonvanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donvanchuyen', function (Blueprint $table) {
            $table->bigIncrements('dvc_id');
            $table->bigInteger('dvc_madon');
            $table->dateTime('dvc_ngaylap');
            $table->integer('dvc_thongbao');
            $table->string('dvc_hinhthucgui');
            
            $table->bigInteger('kh_id')->unsigned();
            $table->foreign('kh_id')->references('kh_id')->on('khachhang')->onDelete('CASCADE');
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
        Schema::dropIfExists('donvanchuyen');
    }
}
