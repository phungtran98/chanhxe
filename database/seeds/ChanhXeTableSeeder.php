<?php

use Illuminate\Database\Seeder;

class ChanhXeTableSeeder extends Seeder
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
                'cx_hoten' =>'Lê Ngọc Đức',
                'cx_sdt' =>'0123456789',
                'username' => 'ctu',
                'password' => bcrypt('ctu'),
            ],
            
        ];
        DB::table('chanhxe')->insert($data);
    }
}
