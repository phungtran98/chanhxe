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
            $table->bigIncrements('ctdvc_id');
            $table->integer('ctdvc_trangthaidon');
            $table->integer('ctdvc_phigui');
            $table->string('ctdvc_hotennhan',199);
            $table->string('ctdvc_sdtnhan',199);
            $table->string('ctdvc_diachinhan',199);
            $table->string('ctdvc_km');
            $table->string('ctdvc_thoigian');
            $table->string('ctdvc_mota',199);

            $table->bigInteger('dvc_id')->unsigned();
            $table->foreign('dvc_id')->references('dvc_id')->on('donvanchuyen')->onDelete('CASCADE');
            
            $table->bigInteger('hh_id')->unsigned();
            $table->foreign('hh_id')->references('hh_id')->on('hanghoa')->onDelete('CASCADE');
            
            $table->bigInteger('t_id')->unsigned();
            $table->foreign('t_id')->references('t_id')->on('tuyen')->onDelete('CASCADE');

            // $table->primary(['dvc_id','hh_id','t_id']);
            
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
