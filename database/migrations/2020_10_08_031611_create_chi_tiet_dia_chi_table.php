<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietDiaChiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdiachi', function (Blueprint $table) {
            $table->bigInteger('p_id')->unsigned();
            $table->foreign('p_id')->references('p_id')->on('phuong')->onDelete('CASCADE');
            
            $table->bigInteger('cx_id')->unsigned();
            $table->foreign('cx_id')->references('cx_id')->on('chanhxe')->onDelete('CASCADE');

            $table->string('ctdc_tenduong');

            $table->primary(['p_id','cx_id']);

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
        Schema::dropIfExists('chitietdiachi');
    }
}
