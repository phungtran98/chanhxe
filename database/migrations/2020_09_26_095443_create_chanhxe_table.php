<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChanhxeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chanhxe', function (Blueprint $table) {
            $table->bigIncrements('cx_id');
            $table->string('cx_tenchanhxe',199);
            $table->string('cx_hoten',199);
            $table->string('cx_hinhanh',199)->nullable();
            $table->string('cx_gioitinh',4)->nullable();
            $table->string('cx_sdt',10)->nullable();
            $table->string('cx_cmnd',199)->nullable();
            $table->string('cx_giayphep',199)->nullable();
            $table->string('cx_kinhdo',199)->nullable();
            $table->string('cx_vido',199)->nullable();
            $table->string('code')->nullable();
            $table->tinyInteger('activate')->default(0);
            $table->string('username');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('chanhxe');
    }
}
