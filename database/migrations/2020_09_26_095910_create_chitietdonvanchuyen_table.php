<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonvanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonvanchuyen', function (Blueprint $table) {
            
            $table->dateTime('ctdvc_ngaygui');
            $table->string('ctdvc_trangthai');
            $table->integer('ctdvc_tienthuho');
            $table->integer('ctdvc_phigui');
            $table->string('ctdvc_hotenNN',199);
            $table->string('ctdvc_sdtNN',199);
            $table->string('ctdvc_diachiNN',199);

            $table->bigInteger('dvc_id')->unsigned();
            $table->foreign('dvc_id')->references('dvc_id')->on('donvanchuyen')->onDelete('CASCADE');
            
            $table->bigInteger('hh_id')->unsigned();
            $table->foreign('hh_id')->references('hh_id')->on('hanghoa')->onDelete('CASCADE');

            $table->primary(['dvc_id','hh_id']);
            
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
        Schema::dropIfExists('chitietdonvanchuyen');
    }
}
