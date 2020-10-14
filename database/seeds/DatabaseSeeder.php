<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ChanhXeTableSeeder::class);
        $this->call(KhachHangTableSeeder::class);
        $this->call(XeTableSeeder::class);
        $this->call(BaiDauXeTableSeeder::class);
        $this->call(TuyenTableSeeder::class);
        $this->call(ChiTietDiaChiTableSeeder::class);
       
    }
}
