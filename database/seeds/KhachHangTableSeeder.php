<?php

use Illuminate\Database\Seeder;

class KhachHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [   
                'kh_hoten' =>'Trần Thanh Phụng',
                'username' => 'ctu',
                'password' => bcrypt('ctu'),
            ],
            
        ];
        DB::table('khachhang')->insert($data);
    }
}
