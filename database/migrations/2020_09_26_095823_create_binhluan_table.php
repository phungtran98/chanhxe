<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->bigIncrements('bl_id');
            $table->string('bl_noidung',199)->nullable();
            $table->integer('bl_idtraloi')->nullable();
            $table->integer('bl_danhgia')->nullable();
    
            $table->bigInteger('kh_id')->unsigned();
            $table->foreign('kh_id')->references('kh_id')->on('khachhang')->onDelete('CASCADE');

            $table->bigInteger('cx_id')->unsigned();
            $table->foreign('cx_id')->references('cx_id')->on('chanhxe')->onDelete('CASCADE');
            
            $table->timestamp('bl_created')
            ->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
}
