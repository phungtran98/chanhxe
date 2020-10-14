<?php

use Illuminate\Database\Seeder;

class TuyenTableSeeder extends Seeder
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
            't_tentuyen' =>'Cần Thơ - Cà Mau',
            't_mota' =>'Không',
            'bdx_id' =>1,
            'x_id'=>1,
            'cx_id'=>1
        ],
        [   
            't_tentuyen' =>'Cà Mau - Cần Thơ',
            't_mota' =>'Không',
            'bdx_id' =>2,
            'x_id'=>1,
            'cx_id'=>1
        ],
        [   
            't_tentuyen' =>'Cần Thơ - Trà Vinh',
            't_mota' =>'Không',
            'bdx_id' =>3,
            'x_id'=>2,
            'cx_id'=>2
        ],
        [   
            't_tentuyen' =>'Trà Vinh - Cần Thơ',
            't_mota' =>'Không',
            'bdx_id' =>4,
            'x_id'=>2,
            'cx_id'=>2
        ],


       ];
       DB::table('tuyen')->insert($data);
    }
}
