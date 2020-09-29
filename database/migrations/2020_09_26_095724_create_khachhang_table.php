<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->bigIncrements('kh_id');
            $table->string('kh_ten',199);
            $table->string('kh_sdt',199);
            $table->string('kh_hinhanh',199)->nullable();
            $table->string('kh_diachi',199)->nullable();;
            $table->string('kh_email',199)->nullable();;
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
        Schema::dropIfExists('khachhang');
    }
}
